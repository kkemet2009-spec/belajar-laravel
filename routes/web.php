<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicArticleController;


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIC
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produk Public
Route::get('/produk', [PublicProductController::class, 'index'])
    ->name('public.products.index');

Route::get('/produk/{product}', [PublicProductController::class, 'show'])
    ->name('public.products.show');

// Artikel Public
Route::get('/artikel', [PublicArticleController::class, 'index'])
    ->name('public.articles.index');

Route::get('/artikel/{article}', [PublicArticleController::class, 'show'])
    ->name('public.articles.show');

// Kontak
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | CRUD PRODUK
    |--------------------------------------------------------------------------
    */

    Route::resource('products', ProductController::class);


    /*
    |--------------------------------------------------------------------------
    | CRUD ARTIKEL
    |--------------------------------------------------------------------------
    */

    Route::resource('articles', ArticleController::class);

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';