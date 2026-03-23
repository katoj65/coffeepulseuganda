<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    /**
     * Display the application landing page.
     */
    public function index(): Response
    {
        $featuredLots = [];

        if (Schema::hasTable('samples')) {
            $featuredLots = Sample::query()
                ->latest()
                ->take(3)
                ->get()
                ->map(fn (Sample $sample) => [
                    'id' => $sample->id,
                    'title' => $sample->item,
                    'description' => $sample->description,
                    'amount' => $sample->amount ?: 'Available on request',
                    'image' => $sample->image ? Storage::url($sample->image) : null,
                ])
                ->all();
        }

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'featuredLots' => $featuredLots,
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
