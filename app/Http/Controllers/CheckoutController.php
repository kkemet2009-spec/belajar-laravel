<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN CHECKOUT
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Hitung total
        $total = 0;

        foreach ($cart as $item) {
            $total += (float) $item['price'] * (int) $item['quantity'];
        }

        // Ambil pesanan terakhir jika ada
        $lastOrder = session()->get('last_order');

        return view('checkout.index', compact(
            'cart',
            'total',
            'lastOrder'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | BELI SEKARANG
    |--------------------------------------------------------------------------
    */

    public function buyNow(Product $product)
    {
        // Cek stok
        if ($product->stock <= 0) {
            return back()->with(
                'error',
                'Produk sedang habis.'
            );
        }

        // Buat keranjang baru
        $cart = [];

        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => (float) $product->price,
            'image' => $product->image,
            'quantity' => 1,
        ];

        // Simpan ke session
        session()->put('cart', $cart);

        // Hapus pesanan terakhir agar checkout baru tidak
        // menampilkan pesanan lama
        session()->forget('last_order');

        return redirect()->route('checkout.index');
    }


    /*
    |--------------------------------------------------------------------------
    | PROSES CHECKOUT
    |--------------------------------------------------------------------------
    */

    public function process(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
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
                'in:cod,transfer',
            ],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',

            'phone.required' => 'Nomor WhatsApp wajib diisi.',

            'address.required' => 'Alamat lengkap wajib diisi.',

            'payment_method.required' => 'Silakan pilih metode pembayaran.',

            'payment_method.in' => 'Metode pembayaran tidak valid.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | AMBIL CART
        |--------------------------------------------------------------------------
        */

        $cart = session()->get('cart', []);

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
        | CEK STOK
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {

            $product = Product::find($item['id']);

            if (!$product) {
                return back()->with(
                    'error',
                    'Produk tidak ditemukan.'
                );
            }

            if ($product->stock < $item['quantity']) {
                return back()->with(
                    'error',
                    'Stok produk "' . $product->name . '" tidak mencukupi.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG TOTAL
        |--------------------------------------------------------------------------
        */

        $total = 0;

        foreach ($cart as $item) {
            $total +=
                (float) $item['price']
                *
                (int) $item['quantity'];
        }


        /*
        |--------------------------------------------------------------------------
        | NOMOR PESANAN
        |--------------------------------------------------------------------------
        */

        $orderNumber =
            'JS-'
            . date('Ymd')
            . '-'
            . strtoupper(Str::random(5));


        /*
        |--------------------------------------------------------------------------
        | SIMPAN ORDER
        |--------------------------------------------------------------------------
        */

        $order = Order::create([
            // Null jika tamu, terisi jika user sedang login
            'user_id' => auth()->id(),

            'order_number' => $orderNumber,

            'customer_name' => $request->name,

            'phone' => $request->phone,

            'address' => $request->address,

            'total' => $total,

            'status' => 'pending',
        ]);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN ORDER ITEM + KURANGI STOK
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {

            // Simpan item pesanan
            $order->items()->create([
                'product_id' => $item['id'],

                'product_name' => $item['name'],

                'price' => $item['price'],

                'quantity' => $item['quantity'],

                'subtotal' =>
                    (float) $item['price']
                    *
                    (int) $item['quantity'],
            ]);


            // Kurangi stok
            Product::where(
                'id',
                $item['id']
            )->decrement(
                'stock',
                $item['quantity']
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN LAST ORDER
        |--------------------------------------------------------------------------
        */

        session()->put('last_order', [

            'order_number' => $orderNumber,

            'name' => $request->name,

            'phone' => $request->phone,

            'address' => $request->address,

            'payment_method' => $request->payment_method,

            'cart' => $cart,

            'total' => $total,

            'created_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | HAPUS CART
        |--------------------------------------------------------------------------
        */

        session()->forget('cart');


        /*
        |--------------------------------------------------------------------------
        | KEMBALI KE CHECKOUT
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