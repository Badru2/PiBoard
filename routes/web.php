<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Tweet\TweetDeleteController;
use App\Http\Controllers\Tweet\TweetEditController;
use App\Http\Controllers\Tweet\TweetShowController;
use App\Http\Controllers\Tweet\TweetStoreController;
use App\Http\Controllers\Tweet\TweetUpdateController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', DashboardController::class)->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile/@{name}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/follow/{user_id}', [ProfileController::class, 'follow'])->name('user.follow');

    Route::get('/create', TweetController::class)->name('create');
    Route::get('search', SearchController::class)->name('search');

    Route::post('tweets', TweetStoreController::class)->name('tweets.store');
    Route::delete('tweets/{id}', TweetDeleteController::class)->name('tweets.destroy');
    Route::get('tweets/{id}/edit', TweetEditController::class)->name('tweets.edit');
    Route::put('tweets/{id}', TweetUpdateController::class)->name('tweets.update');
    Route::get('tweets/detail/{id}', TweetShowController::class)->name('tweets.detail');

    Route::post('store', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/like/{id}', [LikeController::class, 'toggle']);
});

require __DIR__ . '/auth.php';
