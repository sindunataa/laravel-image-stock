<?php

use App\Events\ServerCreated;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GaleriesController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::prefix('galeries/')->name('galeries.')->group(function () {
    Route::get('/', [GaleryController::class, 'index'])->name('index');
    Route::get('/create', [GaleryController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [GaleryController::class, 'edit'])->name('edit');
    Route::post('/store', [GaleryController::class, 'store'])->name('store');
    Route::post('/update/{id}', [GaleryController::class, 'update'])->name('update');
    Route::delete('/galeries/destroy/{galery}', [GaleryController::class, 'destroy'])->name('destroy');
});

Route::prefix('albums/')->name('albums.')->group(function () {
    Route::get('/', [AlbumController::class, 'index'])->name('index');
    Route::get('/create', [AlbumController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [AlbumController::class, 'edit'])->name('edit');
    Route::post('/store', [AlbumController::class, 'store'])->name('store');
    Route::post('/update/{id}', [AlbumController::class, 'update'])->name('update');
    Route::delete('/albums/destroy/{album}', [AlbumController::class, 'destroy'])->name('destroy');
});

Route::prefix('authors/')->name('authors.')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::get('/create', [AuthorController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('edit');
    Route::post('/store', [AuthorController::class, 'store'])->name('store');
    Route::post('/update/{id}', [AuthorController::class, 'update'])->name('update');
    Route::delete('/authors/destroy/{author}', [AuthorController::class, 'destroy'])->name('destroy');
});

Route::prefix('articles/')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit');
    Route::post('/store', [ArticleController::class, 'store'])->name('store');
    Route::post('/update/{id}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/articles/destroy/{article}', [ArticleController::class, 'destroy'])->name('destroy');
});

Route::prefix('users/')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
