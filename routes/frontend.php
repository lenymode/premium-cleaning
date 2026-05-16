<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\QuoteRequestController;
use App\Http\Controllers\Frontend\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/robots.txt', [HomeController::class, 'robots'])->name('frontend.robots');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('frontend.sitemap');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/services', [ServiceController::class, 'index'])->name('frontend.services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('frontend.services.show');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::post('/quote-requests', [QuoteRequestController::class, 'store'])->name('frontend.quote-requests.store');
