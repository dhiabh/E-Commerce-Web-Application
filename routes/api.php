<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PanierController;
use App\Http\Resources\ArticlesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoriesController::class, 'index']);

//Route::get('/getArticles', [ArticlesController::class, 'getArticles']);

//Route::post('/articles/{article}/add-to-cart', [PanierController::class, 'addArticle'])->name('addToPanier');

Route::get('/articles/{article}/add-to-cart', [PanierController::class, 'addArticle'])->name('addToPanier');

Route::get('/paniers/{article}', [PanierController::class, 'destroy']);

//Route::get('/getPanier', [PanierController::class, 'getPanier']);
//Route::get('/getArticles_Panier', [PanierController::class, 'getArticles_Panier']);

//Route::put('/updateArticlePanier/{article}', [PanierController::class, 'updateArticlePanier']);