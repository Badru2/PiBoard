<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Tweet\TweetDeleteController;
use App\Http\Controllers\Tweet\TweetShowController;
use App\Http\Controllers\Tweet\TweetStoreController;
use App\Http\Controllers\TweetController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile/@{name}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/create', TweetController::class)->name('create');
    Route::post('tweets', TweetStoreController::class)->name('tweets.store');
    Route::delete('tweets/{id}', TweetDeleteController::class)->name('tweets.destroy');
    Route::post('store', [CommentController::class, 'store'])->name('comments.store');
    Route::get('tweets/detail/{id}', TweetShowController::class)->name('tweets.detail');
    Route::get('search', SearchController::class)->name('search');
    Route::get('/like/{id}', [LikeController::class, 'toggle']);
});

require __DIR__ . '/auth.php';
