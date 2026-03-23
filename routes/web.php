<?php

use App\Http\Controllers\Api\WelcomeController;
use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return Inertia::render('About', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/blockchain', [BlockchainController::class, 'index'])->name('blockchain');

Route::get('/sustainability', function () {
    return Inertia::render('Sustainability', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('sustainability');

Route::get('/roadmap', function () {
    return Inertia::render('Roadmap', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('roadmap');

Route::get('/protocol', function () {
    return Inertia::render('Protocol');
})->name('protocol');

Route::get('/origins', function () {
    return Inertia::render('Origins', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('origins');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

Route::get('/sample', [SampleController::class, 'index'])->name('sample.index');
Route::get('/sample/{sample}', [SampleController::class, 'show'])->name('sample.show');
Route::post('/sample', [SampleController::class, 'store'])->name('sample.store');

Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/notifications', function () {
        return Inertia::render('Notifications');
    })->name('notifications.index');

    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventories', [InventoryController::class, 'store'])->name('inventory.records.store');
    Route::get('/samples/create', [SampleController::class, 'create'])->name('samples.create');
    Route::post('/samples', [SampleController::class, 'store'])->name('samples.records.store');
});
