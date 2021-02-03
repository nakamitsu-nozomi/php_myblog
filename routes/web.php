<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [PostsController::class, "index"]);
// Route::get("/posts/{id}", [PostsController::class, "show"])->where("post", "[0-9]+");
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
Route::get("/posts/create", [PostsController::class, "create"]);
Route::post("/posts", [PostsController::class, "store"]);
Route::get("/posts/{post}/edit", [PostsController::class, "edit"]);
Route::patch("/posts/{post}", [PostsController::class, "update"]);
Route::delete("/posts/{post}", [PostsController::class, "destroy"]);
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::delete("/posts/{post}/comments/{comment}", "CommentsController@destroy");
