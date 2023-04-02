<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HighlightsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::controller(LoginController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('ad-login', 'create')->name('admin.login');
        Route::post('ad-login', 'store')->middleware(ProtectAgainstSpam::class);
    });

Route::controller(LoginController::class)
    ->middleware('auth')
    ->group(function () {
        Route::post('logout', 'destroy')->name('admin.logout');
    });

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('news', NewsController::class);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('highlights', HighlightsController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);
        Route::resource('comments', CommentController::class)->except(['show', 'create']);
        Route::resource('visitors', VisitorController::class)->only(['index', 'destroy']);
        Route::resource('sliders', SliderController::class)->except(['show']);
    });