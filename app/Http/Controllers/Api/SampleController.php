<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Sample::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'names' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'lot_name' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'status' => ['nullable', 'string', 'max:255'],
        ]);

        $sample = Sample::create([
            ...$validated,
            'status' => $validated['status'] ?? 'pending',
        ]);

        return response()->json($sample, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sample $sample): JsonResponse
    {
        return response()->json($sample);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sample $sample): JsonResponse
    {
        $validated = $request->validate([
            'names' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'lot_name' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'status' => ['nullable', 'string', 'max:255'],
        ]);

        $sample->update($validated);

        return response()->json($sample->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sample $sample): JsonResponse
    {
        $sample->delete();

        return response()->json([], 204);
    }
}
