<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
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

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts/create', [Postcontroller::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('edit');
    Route::put('/posts/{post}', [PostController::class,'update'])->name('update');
    Route::post('/posts', [Postcontroller::class, 'store'])->name('posts.store');
    Route::post('/bookmarks/{post}', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
    Route::get('/profile/bookmarks', [BookmarkController::class, 'index'])->name('profile.bookmarks');
    Route::post('/posts/comments', [CommentController::class, 'store'])->name('comment');
    Route::post('/posts/{post}/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}', [Postcontroller::class, 'show'])->name('posts.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
