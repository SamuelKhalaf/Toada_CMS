<?php

use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\PageContentController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\InsightController;
use App\Http\Controllers\admin\StoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {

    // Users Routes
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/user/all', [UsersController::class, 'getUsersDatatable'])->name('users.datatable');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

    // Redirect dashboard to users
    Route::get('/dashboard', function () {
        return redirect()->route('admin.users.index');
    })->name('dashboard');

    // Pages Management Routes
    Route::prefix('pages')->group(function() {
        Route::get('/', [PageContentController::class, 'index'])->name('pages.index');
        Route::get('/{pageName}/edit', [PageContentController::class, 'edit'])->name('pages.edit');
        Route::put('/{pageName}', [PageContentController::class, 'update'])->name('pages.update');
        Route::post('/upload-image', [PageContentController::class, 'uploadImage'])->name('pages.upload-image');
    });

    // Social Media Routes
    Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social-media.index');
    Route::get('/social-media/all', [SocialMediaController::class, 'getSocialMediaDatatable'])->name('social-media.datatable');
    Route::post('/social-media', [SocialMediaController::class, 'store'])->name('social-media.store');
    Route::get('/social-media/{socialMedia}/edit', [SocialMediaController::class, 'edit'])->name('social-media.edit');
    Route::put('/social-media/{socialMedia}', [SocialMediaController::class, 'update'])->name('social-media.update');
    Route::delete('/social-media/{socialMedia}', [SocialMediaController::class, 'destroy'])->name('social-media.destroy');
    Route::post('/social-media/upload-icon', [SocialMediaController::class, 'uploadIcon'])->name('social-media.upload-icon');

    // Insights Routes
    Route::get('/insights', [InsightController::class, 'index'])->name('insights.index');
    Route::get('/insights/all', [InsightController::class, 'getInsightsDatatable'])->name('insights.datatable');
    Route::get('/insights/create', [InsightController::class, 'create'])->name('insights.create');
    Route::post('/insights', [InsightController::class, 'store'])->name('insights.store');
    Route::get('/insights/{insight}/edit', [InsightController::class, 'edit'])->name('insights.edit');
    Route::put('/insights/{insight}', [InsightController::class, 'update'])->name('insights.update');
    Route::delete('/insights/{insight}', [InsightController::class, 'destroy'])->name('insights.destroy');
    Route::post('/insights/upload-image', [InsightController::class, 'uploadImage'])->name('insights.upload-image');

    // Stories Routes
    Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
    Route::get('/stories/all', [StoryController::class, 'getStoriesDatatable'])->name('stories.datatable');
    Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
    Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
    Route::get('/stories/{story}/edit', [StoryController::class, 'edit'])->name('stories.edit');
    Route::put('/stories/{story}', [StoryController::class, 'update'])->name('stories.update');
    Route::delete('/stories/{story}', [StoryController::class, 'destroy'])->name('stories.destroy');
    Route::post('/stories/upload-image', [StoryController::class, 'uploadImage'])->name('stories.upload-image');

});

