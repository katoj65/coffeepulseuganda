<?php

namespace App\Http\Controllers;

use App\Models\Marketplace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class MarketplaceController extends Controller
{
    /**
     * Show the form for creating a marketplace lot.
     */
    public function create(): Response
    {
        return Inertia::render('Marketplaces/Create', [
            'defaults' => [
                'title' => '',
                'region' => '',
                'variety' => '',
                'score' => '',
                'altitude' => '',
                'status' => '',
                'process' => '',
                'price' => '',
                'image' => null,
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 0,
            ],
        ]);
    }

    /**
     * Store a newly created marketplace lot.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'variety' => ['required', 'string', 'max:255'],
            'score' => ['required', 'numeric', 'between:0,100'],
            'altitude' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'process' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'image', 'max:5120'],
            'is_active' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['image'] = $request->file('image')->store('marketplaces', 'public');

        Marketplace::create($validated);

        return redirect()->route('marketplace');
    }

    /**
     * Display the marketplace page.
     */
    public function index(): Response
    {
        $records = collect();

        if (Schema::hasTable('marketplaces')) {
            $records = Marketplace::query()
                ->where('is_active', true)
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->latest('id')
                ->get();
        }

        $lots = $records
                ->map(fn (Marketplace $marketplace) => [
                    'id' => $marketplace->id,
                    'title' => $marketplace->title,
                    'region' => $marketplace->region,
                    'variety' => $marketplace->variety,
                    'score' => number_format((float) $marketplace->score, 1),
                    'altitude' => $marketplace->altitude,
                    'status' => $marketplace->status,
                    'process' => $marketplace->process,
                    'price' => '$' . number_format((float) $marketplace->price, 2),
                    'image' => filter_var($marketplace->image, FILTER_VALIDATE_URL)
                        ? $marketplace->image
                        : Storage::url($marketplace->image),
                ]);

        return Inertia::render('Marketplace', [
            'summary' => [
                'available_lots' => $records->count(),
                'featured_lots' => $records->where('is_featured', true)->count(),
                'market_status' => $records->isNotEmpty() ? 'Market Open' : 'Awaiting Listings',
            ],
            'lots' => $lots->values()->all(),
        ]);
    }
}
