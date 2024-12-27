<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\EnsureEmailIsVerified;
use App\Livewire\About;
use App\Livewire\Category;
use App\Livewire\Feedback;
use App\Livewire\Home;
use App\Livewire\News;
use App\Livewire\Search;
use Illuminate\Support\Facades\Route;





Route::get('/', Home::class)->name('index');
Route::get('/about', About::class)->name('about');
Route::get('/feedback', Feedback::class)->name('feedback');
Route::get('/search/{query}', Search::class)->name('search');
Route::get('/category-find/{name}', Category::class)->name('category-find');
Route::get('/news/{slug}', News::class)->name('news');


Route::middleware(['auth', EnsureEmailIsVerified::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('role:admin')->group(function () {

    Route::resource('article', ArticleController::class);
    Route::resource('comment', CommentController::class);
    Route::put('/article-publish/{id}', [ArticleController::class, 'updatePublishedAt'])->name('article.publish');
    Route::resource('users', UsersController::class);
    Route::resource('category', CategoryController::class);
});
Route::get('/google/redirect', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

require __DIR__ . '/auth.php';
