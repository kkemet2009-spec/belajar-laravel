<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN CHECKOUT
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $cart = session()->get('cart', []);

        /*
        |--------------------------------------------------------------------------
        | CEK APAKAH ADA PESANAN TERAKHIR
        |--------------------------------------------------------------------------
        */

        $lastOrder = session()->get('last_order');

        /*
        |--------------------------------------------------------------------------
        | Jika tidak ada cart dan tidak ada pesanan terakhir
        |--------------------------------------------------------------------------
        */

        if (empty($cart) && !$lastOrder) {
            return redirect()
                ->route('public.products.index')
                ->with(
                    'error',
                    'Keranjang masih kosong.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Hitung total
        |--------------------------------------------------------------------------
        */

        $total = 0;

        foreach ($cart as $item) {
            $total +=
                (float) $item['price']
                * (int) $item['quantity'];
        }

        return view(
            'checkout.index',
            compact(
                'cart',
                'total',
                'lastOrder'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | BELI SEKARANG
    |--------------------------------------------------------------------------
    |
    | Tombol "Beli Sekarang" dari halaman detail produk.
    |
    */

    public function buyNow(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | Cek stok
        |--------------------------------------------------------------------------
        */

        if ($product->stock <= 0) {
            return back()->with(
                'error',
                'Produk sedang habis.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Buat cart baru khusus untuk Beli Sekarang
        |--------------------------------------------------------------------------
        |
        | Kita tidak mencampur produk ini dengan keranjang sebelumnya.
        |
        */

        $cart = [];

        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => (float) $product->price,
            'image' => $product->image,
            'quantity' => 1,
        ];

        session()->put(
            'cart',
            $cart
        );

        /*
        |--------------------------------------------------------------------------
        | Hapus pesanan terakhir
        |--------------------------------------------------------------------------
        */

        session()->forget('last_order');

        /*
        |--------------------------------------------------------------------------
        | Arahkan ke checkout
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('checkout.index');
    }


    /*
    |--------------------------------------------------------------------------
    | PROSES CHECKOUT
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'address' => [
                'required',
                'string',
                'max:500',
            ],

            'payment_method' => [
                'required',
                'string',
                'max:50',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Ambil cart
        |--------------------------------------------------------------------------
        */

        $cart = session()->get(
            'cart',
            []
        );


        /*
        |--------------------------------------------------------------------------
        | Cek cart kosong
        |--------------------------------------------------------------------------
        */

        if (empty($cart)) {
            return redirect()
                ->route('public.products.index')
                ->with(
                    'error',
                    'Keranjang masih kosong.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Cek stok terbaru
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {

            $product = Product::find(
                $item['id']
            );

            if (!$product) {
                return back()->with(
                    'error',
                    'Produk tidak ditemukan.'
                );
            }

            if (
                $product->stock
                < $item['quantity']
            ) {
                return back()->with(
                    'error',
                    'Stok produk "' .
                    $product->name .
                    '" tidak mencukupi.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Hitung total
        |--------------------------------------------------------------------------
        */

        $total = 0;

        foreach ($cart as $item) {

            $total +=
                (float) $item['price']
                * (int) $item['quantity'];
        }


        /*
        |--------------------------------------------------------------------------
        | Nomor pesanan
        |--------------------------------------------------------------------------
        */

        $orderNumber =
            'DEV-' .
            now()->format('YmdHis') .
            '-' .
            random_int(
                100,
                999
            );


        /*
        |--------------------------------------------------------------------------
        | DATA PESANAN
        |--------------------------------------------------------------------------
        */

        $order = [

            'order_number' =>
                $orderNumber,

            'name' =>
                $validated['name'],

            'phone' =>
                $validated['phone'],

            'address' =>
                $validated['address'],

            'payment_method' =>
                $validated['payment_method'],

            'cart' =>
                $cart,

            'total' =>
                $total,

            'created_at' =>
                now(),
        ];


        /*
        |--------------------------------------------------------------------------
        | Simpan pesanan sementara
        |--------------------------------------------------------------------------
        */

        session()->put(
            'last_order',
            $order
        );


        /*
        |--------------------------------------------------------------------------
        | Kurangi stok
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {

            $product = Product::find(
                $item['id']
            );

            if ($product) {

                $product->decrement(
                    'stock',
                    $item['quantity']
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Kosongkan keranjang
        |--------------------------------------------------------------------------
        */

        session()->forget(
            'cart'
        );


        /*
        |--------------------------------------------------------------------------
        | Kembali ke checkout
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('checkout.index')
            ->with(
                'success',
                'Pesanan berhasil dibuat.'
            );
    }
}