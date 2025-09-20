<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\HeroSection;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $hero = HeroSection::firstOrNew([], [
        'title' => 'Welcome to Our Website',
        'subtitle' => 'This is a default subtitle. Please edit it in the admin panel.',
    ]);
    $services = Service::orderBy('order')->get();
    return view('welcome', compact('hero', 'services'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk mengelola Hero Section
    Route::get('/admin/hero', [App\Http\Controllers\Admin\HeroSectionController::class, 'edit'])->name('admin.hero.edit');
    Route::patch('/admin/hero', [App\Http\Controllers\Admin\HeroSectionController::class, 'update'])->name('admin.hero.update');

    // Route untuk mengelola Services
    Route::resource('/admin/services', App\Http\Controllers\Admin\ServiceController::class)->names('admin.services');
});

require __DIR__.'/auth.php';

