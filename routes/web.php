<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\FrontendInsightController;
use App\Http\Controllers\FrontendStoryController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/insights', [FrontendInsightController::class, 'index'])->name('insights');
Route::get('/insights/{slug}', [FrontendInsightController::class, 'show'])->name('insights-description');

Route::get('/success-stories', [FrontendStoryController::class, 'index'])->name('success-stories');
Route::get('/story/{slug}', [FrontendStoryController::class, 'show'])->name('story-description');

Route::get('/bio/{member}', function ($member) {
    return view('pages.bio', ['member' => $member]);
})->name('bio');

// Authentication routes (registration is disabled)
Auth::routes(['register' => false]);

// Language switching routes (accessible to everyone)
Route::get('/language/switch/{language}', [App\Http\Controllers\admin\LanguageController::class, 'switch'])
    ->name('language.switch')
    ->where('language', 'ar|en');

Route::get('/language/current', [App\Http\Controllers\admin\LanguageController::class, 'current'])
    ->name('language.current');

// Subscription route
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
