<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\SampleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Sample', [
            'sample' => null,
        ]);
    }

    /**
     * Show the form for creating a new sample record.
     */
    public function create(): Response
    {
        return Inertia::render('Samples/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->routeIs('samples.records.store')) {
            $validated = $request->validate([
                'item' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:10', 'max:255'],
                'amount' => ['required', 'string', 'max:255'],
                'notes' => ['required', 'string', 'max:2000'],
                'image' => ['required', 'image', 'max:5120'],
            ]);

            $validated['image'] = $request->file('image')->store('samples', 'public');
            $validated['status'] = 'pending';

            Sample::create($validated);

            return redirect()
                ->route('samples.create');
        }

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'shipping_address' => ['required', 'string'],
            'sample_type' => ['required', 'string', 'max:255'],
            'special_requirements' => ['nullable', 'string'],
        ]);

        SampleRequest::create([
            'names' => $validated['full_name'],
            'company' => $validated['company'] ?? null,
            'email' => $validated['email'],
            'shipping_address' => $validated['shipping_address'],
            'sample_type' => $validated['sample_type'],
            'special_requirements' => $validated['special_requirements'] ?? null,
        ]);

        return redirect()
            ->back()
            ->with('flash.banner', 'Sample request submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sample $sample): Response
    {
        return Inertia::render('Sample', [
            'sample' => [
                'id' => $sample->id,
                'item' => $sample->item,
                'description' => $sample->description,
                'amount' => $sample->amount,
                'notes' => $sample->notes,
                'status' => $sample->status,
                'image' => $sample->image ? Storage::url($sample->image) : null,
                'created_at' => optional($sample->created_at)?->format('F j, Y'),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
