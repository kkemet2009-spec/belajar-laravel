<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\OrderController;


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

Route::get('/produk', [PublicProductController::class, 'index'])
    ->name('public.products.index');

Route::get('/produk/{product}', [PublicProductController::class, 'show'])
    ->name('public.products.show');


// =====================================================
// KERANJANG
// =====================================================

Route::get('/keranjang', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/keranjang/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::patch('/keranjang/{product}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/keranjang/{product}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::delete('/keranjang', [CartController::class, 'clear'])
    ->name('cart.clear');


// =====================================================
// BELI SEKARANG
// =====================================================

Route::post('/beli-sekarang/{product}', [CheckoutController::class, 'buyNow'])
    ->name('checkout.buyNow');


// =====================================================
// CHECKOUT
// =====================================================

// Menampilkan halaman checkout
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

// Memproses pesanan checkout
Route::post('/checkout', [CheckoutController::class, 'process'])
    ->name('checkout.store');


// =====================================================
// WISHLIST
// =====================================================

Route::get('/wishlist', [CartController::class, 'wishlist'])
    ->name('wishlist.index');

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


Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');



/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {


    // =================================================
    // DASHBOARD
    // =================================================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // =================================================
    // KELOLA PRODUK
    // =================================================

    Route::resource('products', ProductController::class);


    // =================================================
    // KELOLA ARTIKEL
    // =================================================

    Route::resource('articles', ArticleController::class);


    // =================================================
    // ADMIN
    // =================================================

    Route::prefix('admin')->name('admin.')->group(function () {


        // =============================================
        // PESAN KONTAK
        // =============================================

        Route::get('messages', [ContactMessageController::class, 'index'])
            ->name('messages.index');

        Route::get('messages/{message}', [ContactMessageController::class, 'show'])
            ->name('messages.show');

        Route::patch('messages/{message}/read', [ContactMessageController::class, 'markRead'])
            ->name('messages.markRead');

        Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])
            ->name('messages.destroy');


        // =============================================
        // PESANAN / ORDER
        // =============================================

        Route::get('orders', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::get('orders/{order}', [OrderController::class, 'show'])
            ->name('orders.show');

        Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

    });

});



/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';