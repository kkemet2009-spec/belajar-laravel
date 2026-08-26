<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN KERANJANG
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }


    /*
    |--------------------------------------------------------------------------
    | TAMBAH PRODUK KE KERANJANG
    |--------------------------------------------------------------------------
    */

    public function add(Product $product)
    {
        if ($product->stock <= 0) {
            return back()->with(
                'error',
                'Produk sedang habis.'
            );
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

            if ($cart[$product->id]['quantity'] >= $product->stock) {
                return back()->with(
                    'error',
                    'Jumlah produk sudah mencapai stok tersedia.'
                );
            }

            $cart[$product->id]['quantity']++;

        } else {

            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return back()->with(
            'success',
            'Produk berhasil ditambahkan ke keranjang.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE JUMLAH PRODUK
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $quantity = (int) $request->quantity;

        if ($product->stock <= 0) {
            return back()->with(
                'error',
                'Produk sedang habis.'
            );
        }

        if ($quantity > $product->stock) {
            return back()->with(
                'error',
                'Jumlah melebihi stok produk.'
            );
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);

        return back()->with(
            'success',
            'Jumlah produk diperbarui.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS PRODUK
    |--------------------------------------------------------------------------
    */

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        unset($cart[$product->id]);

        session()->put('cart', $cart);

        return back()->with(
            'success',
            'Produk dihapus dari keranjang.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | KOSONGKAN KERANJANG
    |--------------------------------------------------------------------------
    */

    public function clear()
    {
        session()->forget('cart');

        return back()->with(
            'success',
            'Keranjang berhasil dikosongkan.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN WISHLIST
    |--------------------------------------------------------------------------
    */

    public function wishlist()
    {
        $wishlist = session()->get('wishlist', []);

        return view('wishlist.index', compact('wishlist'));
    }


    /*
    |--------------------------------------------------------------------------
    | TAMBAH / HAPUS WISHLIST
    |--------------------------------------------------------------------------
    */

    public function toggleWishlist(Product $product)
    {
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$product->id])) {

            unset($wishlist[$product->id]);

            session()->put('wishlist', $wishlist);

            return back()->with(
                'success',
                'Produk dihapus dari wishlist.'
            );
        }

        $wishlist[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => (float) $product->price,
            'image' => $product->image,
        ];

        session()->put('wishlist', $wishlist);

        return back()->with(
            'success',
            'Produk ditambahkan ke wishlist.'
        );
    }
}