<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
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

Route::post('article/comment', [ArticleController::class, 'comment'])->name('comment');

Route::get('/', function () {
    return view('welcome');
});

Route::get('articles', [ArticleController::class, 'index'])->name('index');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('show');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login_process', [AuthController::class, 'login'])->name('login_process');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register_process', [AuthController::class, 'register'])->name('register_process');

Route::post('add-like', [ArticleController::class, 'addLike']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


