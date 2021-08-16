<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\DynamicPDFController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\CategoriesController;
use App\Mail\NewUserWelcomeMail;
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

// verify mail
Auth::routes(['verify' => true]);


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource('users', UserController::class);

Route::get('/get_states', [UserController::class, 'getStates']);

Route::resource('boutiques', BoutiqueController::class);

Route::resource('categories', CategoriesController::class);



// Routes des articles

Route::resource('articles', ArticlesController::class);

Route::post(
        '/articles/search/',
        [ArticlesController::class, 'search']
)->name('articles.search');

Route::get(
        '/articles/search/{input?}/{n}',
        [ArticlesController::class, 'browseSearchResults']
)->name('browse.search');

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


Route::get(
    '/articles/{article}/delete', 
    [ArticlesController::class, 'destroy']
)->name('articles.delete');

Route::get('/articles/browse/{n}/{articles_json?}',
           [ArticlesController::class, 'browse']
)->name('browse');

// Routes des paniers

Route::resource('paniers', PanierController::class);
Route::get('/articles/{article}/add-to-cart', [PanierController::class, 'addArticle'])->name('addToPanier');


// Routes des commandes, livraisons, et factures

Route::resource('commandes', CommandesController::class );
Route::resource('livraisons', LivraisonController::class );
Route::resource('factures', FactureController::class);


// Routes des payments 

Route::resource('payments', PaymentsController::class );

Route::get('/dynamic_pdf', [DynamicPDFController::class, 'index']);

Route::get('/dynamic_pdf/pdf', [DynamicPDFController::class, 'pdf']);

Route::get('/checkout', [PaymentsController::class, 'checkout'])->name('checkout');

Route::get('/payment-success/', [PaymentsController::class, 'valider']);




// Mail Route

Route::get('/email', function() {
    return new NewUserWelcomeMail();
});
