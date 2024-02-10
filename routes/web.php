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

Route::get('/', function () {
    return Post::all();
})->name("dashboard");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::controller(PostController::class)->group(function () {
    Route::get("/", "index")->name("home_page");
    Route::get("/explore", "explore")->name("explore");
    Route::get("p/create", "create")->name("post_create");
    Route::post("p/create", "store")->name("store_post");
    Route::get("p/{post:slug}", "show")->name("show_post");
    Route::get("p/{post:slug}/edit", "edit")->name("post_edit");
    Route::patch("p/{post:slug}/edit", "update")->name("post_update");
    Route::delete("p/{post:slug}/delete", "destroy")->name("delete_post");
});

Route::post("p/{post:slug}/comment", [CommentController::class, "store"])->name("store_comment");
