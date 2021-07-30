<?php

use App\Http\Controllers\ArticleController;
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

Route::resource('articles', ArticleController::class);

Route::resource('paniers', PanierController::class);



