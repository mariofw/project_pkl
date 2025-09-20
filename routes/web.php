<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\About;
use App\Models\HeroSection;
use App\Models\HeroSectionImage;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $hero = HeroSection::firstOrNew([], [
        'title' => 'Welcome to Our Website',
        'subtitle' => 'This is a default subtitle. Please edit it in the admin panel.',
    ]);
    $heroImages = HeroSectionImage::all();
    $services = Service::orderBy('order')->get();
    $about = About::first();
    return view('welcome', compact('hero', 'heroImages', 'services', 'about'));
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

    // Route untuk mengelola Abouts
    Route::get('/admin/abouts', [App\Http\Controllers\Admin\AboutController::class, 'edit'])->name('admin.abouts.edit');
    Route::patch('/admin/abouts', [App\Http\Controllers\Admin\AboutController::class, 'update'])->name('admin.abouts.update');

    // Route untuk mengelola Hero Section Images
    Route::resource('/admin/hero-images', App\Http\Controllers\Admin\HeroSectionImageController::class)->names('admin.hero-images');
});

require __DIR__.'/auth.php';
