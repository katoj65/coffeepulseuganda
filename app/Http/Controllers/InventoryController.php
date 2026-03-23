<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Inventory', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /**
     * Show the form for creating a new inventory record.
     */
    public function create(): Response
    {
        return Inertia::render('Inventory/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lot_name' => ['required', 'string', 'max:255'],
            'origin' => ['required', 'string', 'max:255'],
            'quality' => ['required', 'string', 'max:255'],
            'process' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'string', 'max:255'],
            'notes' => ['required', 'string', 'max:2000'],
        ]);

        Inventory::create($validated);

        return redirect()->route('inventory.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
