<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

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

Route::get('/', function () {
    return view('welcome', [
        'posts' => Post::all()
    ]);
})->name('index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('/posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
    Route::get('/add', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('create');
    Route::post('/', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
    Route::put('/{post}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy');
});

Route::prefix('/categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('index');;
    Route::post('/', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
    Route::put('/{category}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy');

    Route::get('/{category}/posts', [CategoryController::class, 'posts'])->middleware(['auth', 'verified'])->name('posts');
});

Route::prefix('/tags')->name('tags.')->group(function () {
    Route::get('/', [TagController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
    Route::post('/', [TagController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
    Route::put('/{tag}', [TagController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
    Route::delete('/{tag}', [TagController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy');

    Route::get('/{tag}/posts', [TagController::class, 'posts'])->middleware(['auth', 'verified'])->name('posts');
});

Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
    Route::delete('/{user}', [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy');

    Route::get('/{user}/posts', [UserController::class, 'posts'])->middleware(['auth', 'verified'])->name('posts');
});

require __DIR__.'/auth.php';
