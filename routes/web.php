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

// Hapus produk
Route::delete('/keranjang/{product}', [CartController::class, 'remove'])
    ->name('cart.remove');

// Kosongkan keranjang
Route::delete('/keranjang', [CartController::class, 'clear'])
    ->name('cart.clear');


// =====================================================
// BELI SEKARANG
// =====================================================

// Langsung memasukkan produk ke checkout
Route::post('/beli-sekarang/{product}', [CheckoutController::class, 'buy'])
    ->name('checkout.buy');


// =====================================================
// CHECKOUT
// =====================================================

// Halaman checkout
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

// Proses checkout
Route::post('/checkout', [CheckoutController::class, 'process'])
    ->name('checkout.process');


// =====================================================
// WISHLIST
// =====================================================

// Halaman wishlist
Route::get('/wishlist', function () {

    $wishlist = session()->get('wishlist', []);

    return view('wishlist.index', compact('wishlist'));

})->name('wishlist.index');


// Tambah / hapus wishlist
Route::post('/wishlist/{product}', function (\App\Models\Product $product) {

    $wishlist = session()->get('wishlist', []);

    // Jika sudah ada → hapus
    if (isset($wishlist[$product->id])) {

        unset($wishlist[$product->id]);

        session()->put('wishlist', $wishlist);

        return back()->with(
            'success',
            'Produk dihapus dari wishlist.'
        );
    }


    // Jika belum ada → tambahkan
    $wishlist[$product->id] = [

        'id' => $product->id,

        'name' => $product->name,

        'price' => (float) $product->price,

        'image' => $product->image,

    ];


    session()->put(
        'wishlist',
        $wishlist
    );


    return back()->with(
        'success',
        'Produk ditambahkan ke wishlist.'
    );

})->name('wishlist.toggle');


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

    Route::resource(
        'products',
        ProductController::class
    );


    // =================================================
    // KELOLA ARTIKEL
    // =================================================

    Route::resource(
        'articles',
        ArticleController::class
    );

});



/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';