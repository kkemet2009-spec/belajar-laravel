<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK
|--------------------------------------------------------------------------
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
// KERANJANG
// =====================================================

// Halaman keranjang
Route::get('/keranjang', [CartController::class, 'index'])
    ->name('cart.index');

// Tambah produk ke keranjang
Route::post('/keranjang/{product}', [CartController::class, 'add'])
    ->name('cart.add');

// Update jumlah produk
Route::patch('/keranjang/{product}', [CartController::class, 'update'])
    ->name('cart.update');

// Hapus produk dari keranjang
Route::delete('/keranjang/{product}', [CartController::class, 'remove'])
    ->name('cart.remove');

// Kosongkan keranjang
Route::delete('/keranjang', [CartController::class, 'clear'])
    ->name('cart.clear');


// =====================================================
// BELI SEKARANG
// =====================================================

// Langsung menuju checkout dari halaman produk
Route::post('/beli-sekarang/{product}', [CheckoutController::class, 'buyNow'])
    ->name('checkout.buyNow');


// =====================================================
// CHECKOUT
// =====================================================

// Halaman checkout
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

// Proses checkout
Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');


// =====================================================
// WISHLIST
// =====================================================

// Wishlist
Route::get('/wishlist', [CartController::class, 'wishlist'])
    ->name('wishlist.index');

// Tambah/hapus wishlist
Route::post('/wishlist/{product}', [CartController::class, 'toggleWishlist'])
    ->name('wishlist.toggle');


// =====================================================
// ARTIKEL PUBLIK
// =====================================================

Route::get('/artikel', [PublicArticleController::class, 'index'])
    ->name('public.articles.index');

Route::get('/artikel/{article}', [PublicArticleController::class, 'show'])
    ->name('public.articles.show');


// =====================================================
// KONTAK
// =====================================================

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/kontak', function () {
    return view('contact');
})->name('kontak');



/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // =================================================
    // DASHBOARD
    // =================================================

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // =================================================
    // KELOLA PRODUK
    // =================================================

    Route::resource('products', ProductController::class);


    // =================================================
    // KELOLA ARTIKEL
    // =================================================

    Route::resource('articles', ArticleController::class);

});



/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';