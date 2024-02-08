<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
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

Route::get('/', function () {
    return Post::all();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get("p/create", [PostController::class, "create"])->name("post_create");
Route::post("p/create", [PostController::class, "store"])->name("store_post");
Route::get("p/{post:slug}", [PostController::class, "show"])->name("show_post");
Route::post("p/{post:slug}/comment", [CommentController::class, "store"])->name("store_comment");
Route::get("p/{post:slug}/edit", [PostController::class, "edit"])->name("post_edit");
Route::patch("p/{post:slug}/edit", [PostController::class, "update"])->name("post_update");
Route::delete("p/{post:slug}/delete", [PostController::class, "destroy"])->name("delete_post");
