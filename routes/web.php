<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\UserController;
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

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);

Route::resource('boutiques', BoutiqueController::class);



Route::resource('paniers', PanierController::class);



Route::resource('articles', ArticlesController::class);

Route::get(
    '/boutiques/{boutique}/create',
    [ArticlesController::class, 'create'] 
)->name('boutiques.articles.create');

Route::post(
    '/boutiques/{boutique}/articles/store',
    [ArticlesController::class, 'store']
)->name('boutiques.articles.store');

Route::get('/images/{image}/delete', [ArticlesController::class, 'deleteImage'])->name('deleteImage');


Route::post(
    '/articles/{article}/upload-image',
    [ArticlesController::class, 'addImage']
)->name('images.upload');
