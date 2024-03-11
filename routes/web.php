<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

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
    return view('posts.home');
});

Route::get("/dashboard",[PagesController::class,'dashboard'])->name("dashboard")->middleware('auth');

Route::get("/posts",[PostController::class,'index'])->name("posts");
Route::post('/posts/store',[PostController::class,'store'])->name("posts.store");
Route::delete('/posts/{id}/destory',[PostController::class,'destory'])->name("posts.destory");
Route::get('/posts/{id}/show',[PostController::class,'show'])->name("posts.show");
Route::post('/posts/update',[PostController::class,'update'])->name("posts.update");

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'store'])->name('login.store')->middleware('guest');
Route::delete('/logout',[LoginController::class,'destory'])->name('logout');

Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->name('register.store')->middleware('guest');

Route::post('/likes/{id}/store',[LikeController::class, 'store'])->name('likes.store');
Route::delete('/likes/{id}/destory',[LikeController::class, 'destory'])->name('likes.destory');



Route::delete('/user/{id}/destory',[UsersController::class, 'destory'])->name('user.destory');
Route::post('/user/{id}/suspend',[UsersController::class, 'suspend'])->name('user.suspend');
Route::post('/user/{id}/unsuspend',[UsersController::class, 'unsuspend'])->name('user.unsuspend');
Route::post('/user/show',[UsersController::class, 'show'])->name('user.show');
Route::get('/user/search',[UsersController::class, 'search'])->name('user.search');
Route::post('/user/update', [UsersController::class, 'update'])->name('users.update');
Route::post('/users/update', [UsersController::class, 'updateImg'])->name('users.update-img');
