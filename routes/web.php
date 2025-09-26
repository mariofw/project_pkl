<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\HeroSectionImageController;
use App\Http\Controllers\Admin\DocumentationImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\PartnershipController;
use App\Models\About;
use App\Models\DocumentationImage;
use App\Models\HeroSection;
use App\Models\HeroSectionImage;
use App\Models\Service;
use App\Models\Product;
use App\Models\Partnership;
use App\Models\Article;

Route::get('/', function () {
    $hero = HeroSection::first() ?? new HeroSection(['title' => 'Default Title', 'subtitle' => 'Default Subtitle']);
    $services = Service::all();
    $heroImages = HeroSectionImage::all();
    $about = About::first();
    $documentationImages = DocumentationImage::all();
    $products = Product::all();
    $partnerships = Partnership::all();
    $articles = Article::latest()->get();
    return view('welcome', compact('hero', 'services', 'heroImages', 'about', 'documentationImages', 'products', 'partnerships', 'articles'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles/{article}', function (App\Models\Article $article) {
    return view('articles.show', compact('article'));
})->name('articles.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/hero', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::post('/hero', [HeroSectionController::class, 'update'])->name('hero.update');
    Route::resource('hero-images', HeroSectionImageController::class)->except(['show']);
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::get('/abouts', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::post('/abouts', [AboutController::class, 'update'])->name('abouts.update');
    Route::resource('documentation-images', DocumentationImageController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('partnerships', PartnershipController::class)->except(['show']);
});

require __DIR__.'/auth.php';
