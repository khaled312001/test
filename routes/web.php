<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\PortfolioController as FrontendPortfolioController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

// Language switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Frontend routes
Route::group(['middleware' => ['locale']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
    Route::get('/services/{service:slug}', [ServicesController::class, 'show'])->name('services.show');
    Route::get('/portfolio', [FrontendPortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/{portfolio:slug}', [FrontendPortfolioController::class, 'show'])->name('portfolio.show');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

// Admin routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('services', ServiceController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('pages', PageController::class);
    
    Route::get('/contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');
    Route::post('/contacts/export', [ContactSubmissionController::class, 'export'])->name('contacts.export');
    
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

// Authentication routes (Laravel Breeze)
require __DIR__.'/auth.php';
