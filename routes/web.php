<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicArticleController;


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK
|--------------------------------------------------------------------------
|
| Semua halaman yang bisa dilihat pengunjung.
|
*/


// =====================================================
// HOME
// =====================================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// =====================================================
// PRODUK PUBLIK
// =====================================================

// Daftar produk
Route::get('/produk', [PublicProductController::class, 'index'])
    ->name('public.products.index');

// Detail produk
Route::get('/produk/{product}', [PublicProductController::class, 'show'])
    ->name('public.products.show');


// =====================================================
// ARTIKEL PUBLIK
// =====================================================

// Daftar artikel
Route::get('/artikel', [PublicArticleController::class, 'index'])
    ->name('public.articles.index');

// Detail artikel
Route::get('/artikel/{article}', [PublicArticleController::class, 'show'])
    ->name('public.articles.show');


// =====================================================
// KONTAK
// =====================================================

// /contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// /kontak
Route::get('/kontak', function () {
    return view('contact');
});



/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
|
| Semua halaman di bawah ini hanya bisa diakses
| oleh user yang sudah login.
|
*/


Route::middleware(['auth', 'verified'])->group(function () {


    // =================================================
    // DASHBOARD ADMIN
    // =================================================

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // =================================================
    // KELOLA PRODUK ADMIN
    // =================================================
    //
    // /products
    // /products/create
    // /products/{product}
    // /products/{product}/edit
    //
    
    Route::resource('products', ProductController::class);


    // =================================================
    // KELOLA ARTIKEL ADMIN
    // =================================================
    //
    // /articles
    // /articles/create
    // /articles/{article}
    // /articles/{article}/edit
    //

    Route::resource('articles', ArticleController::class);

});



/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
|
| Login, register, logout, password, dll.
|
*/

require __DIR__ . '/auth.php';