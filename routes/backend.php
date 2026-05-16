<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\QuoteRequestController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('backend.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('services', ServiceController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('locations', LocationController::class);
        Route::resource('quote-requests', QuoteRequestController::class)->only(['index', 'show', 'destroy']);
    });
