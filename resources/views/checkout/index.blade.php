@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#FAFAF8] py-10 md:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-10">
            <div class="mb-3 flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="transition hover:text-[#92400E]">
                    Home
                </a>

                <span>/</span>

                <span class="text-gray-900">
                    Checkout
                </span>
            </div>

            <h1 class="text-3xl font-bold tracking-tight text-[#111827] md:text-4xl" style="font-family: 'Playfair Display', serif;">
                Checkout
            </h1>

            <p class="mt-2 text-sm text-gray-500 md:text-base">
                Lengkapi informasi pengiriman untuk menyelesaikan pesanan kamu.
            </p>
        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                <div class="flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100">
                        ✓
                    </span>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        @endif


        {{-- ERROR MESSAGE --}}
        @if(session('error'))
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif


        {{-- VALIDATION ERRORS --}}
        @if($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">
                <p class="mb-2 font-medium text-red-700">
                    Periksa kembali data berikut:
                </p>

                <ul class="list-inside list-disc space-y-1 text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- PESANAN BERHASIL --}}
        @if($lastOrder)

            <div class="mx-auto max-w-3xl">

                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    {{-- Success Header --}}
                    <div class="border-b border-gray-100 px-6 py-8 text-center md:px-10">

                        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-2xl text-green-600">
                            ✓
                        </div>

                        <h2 class="text-2xl font-bold text-[#111827]" style="font-family: 'Playfair Display', serif;">
                            Pesanan Berhasil Dibuat
                        </h2>

                        <p class="mt-2 text-sm text-gray-500">
                            Terima kasih sudah berbelanja di Jersey Store.
                        </p>

                    </div>


                    {{-- Order Number --}}
                    <div class="bg-[#FAFAF8] px-6 py-6 text-center md:px-10">

                        <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                            Nomor Pesanan
                        </p>

                        <p class="mt-2 text-xl font-bold tracking-wide text-[#92400E]">
                            {{ $lastOrder['order_number'] }}
                        </p>

                    </div>


                    {{-- Customer --}}
                    <div class="px-6 py-7 md:px-10">

                        <h3 class="mb-5 text-lg font-bold text-[#111827]">
                            Informasi Pengiriman
                        </h3>

                        <div class="space-y-4 text-sm">

                            <div class="flex justify-between gap-6 border-b border-gray-100 pb-4">
                                <span class="text-gray-500">
                                    Nama
                                </span>

                                <span class="text-right font-medium text-gray-900">
                                    {{ $lastOrder['name'] }}
                                </span>
                            </div>

                            <div class="flex justify-between gap-6 border-b border-gray-100 pb-4">
                                <span class="text-gray-500">
                                    WhatsApp
                                </span>

                                <span class="text-right font-medium text-gray-900">
                                    {{ $lastOrder['phone'] }}
                                </span>
                            </div>

                            <div class="flex justify-between gap-6 border-b border-gray-100 pb-4">
                                <span class="text-gray-500">
                                    Metode Pembayaran
                                </span>

                                <span class="text-right font-medium text-gray-900">
                                    {{ $lastOrder['payment_method'] }}
                                </span>
                            </div>

                            <div>
                                <span class="text-gray-500">
                                    Alamat
                                </span>

                                <p class="mt-2 leading-6 text-gray-900">
                                    {{ $lastOrder['address'] }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Order Items --}}
                    <div class="border-t border-gray-100 px-6 py-7 md:px-10">

                        <h3 class="mb-5 text-lg font-bold text-[#111827]">
                            Detail Pesanan
                        </h3>

                        <div class="space-y-5">

                            @foreach($lastOrder['cart'] as $item)

                                <div class="flex gap-4">

                                    {{-- Image --}}
                                    <div class="h-20 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100">

                                        @if(!empty($item['image']))

                                            <img
                                                src="{{ asset('storage/' . $item['image']) }}"
                                                alt="{{ $item['name'] }}"
                                                class="h-full w-full object-cover"
                                            >

                                        @else

                                            <div class="flex h-full w-full items-center justify-center text-xs text-gray-400">
                                                No Image
                                            </div>

                                        @endif

                                    </div>


                                    {{-- Product --}}
                                    <div class="min-w-0 flex-1">

                                        <h4 class="font-medium text-gray-900">
                                            {{ $item['name'] }}
                                        </h4>

                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $item['quantity'] }} ×
                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </p>

                                    </div>


                                    {{-- Subtotal --}}
                                    <div class="text-right">

                                        <p class="font-semibold text-gray-900">
                                            Rp
                                            {{ number_format(
                                                $item['price'] * $item['quantity'],
                                                0,
                                                ',',
                                                '.'
                                            ) }}
                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>


                        {{-- Total --}}
                        <div class="mt-7 border-t border-gray-200 pt-5">

                            <div class="flex items-center justify-between">

                                <span class="text-base font-medium text-gray-600">
                                    Total Pembayaran
                                </span>

                                <span class="text-2xl font-bold text-[#111827]">
                                    Rp {{ number_format($lastOrder['total'], 0, ',', '.') }}
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="flex flex-col gap-3 border-t border-gray-100 bg-[#FAFAF8] px-6 py-6 sm:flex-row md:px-10">

                        <a
                            href="{{ route('public.products.index') }}"
                            class="flex-1 rounded-full bg-[#111827] px-6 py-3.5 text-center text-sm font-semibold text-white transition hover:bg-[#F4B400] hover:text-[#111827]"
                        >
                            Lanjut Belanja
                        </a>

                        <a
                            href="{{ route('home') }}"
                            class="flex-1 rounded-full border border-gray-300 bg-white px-6 py-3.5 text-center text-sm font-semibold text-gray-900 transition hover:border-[#F4B400] hover:text-[#92400E]"
                        >
                            Kembali ke Home
                        </a>

                    </div>

                </div>

            </div>


        {{-- CHECKOUT FORM --}}
        @else

            <form
                action="{{ route('checkout.store') }}"
                method="POST"
            >

                @csrf


                <div class="grid gap-8 lg:grid-cols-3">

                    {{-- LEFT --}}
                    <div class="space-y-6 lg:col-span-2">

                        {{-- Customer Information --}}
                        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm md:p-8">

                            <div class="mb-7">

                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#92400E]">
                                    01
                                </p>

                                <h2 class="mt-2 text-xl font-bold text-[#111827]">
                                    Informasi Pengiriman
                                </h2>

                                <p class="mt-1 text-sm text-gray-500">
                                    Masukkan data penerima pesanan.
                                </p>

                            </div>


                            <div class="grid gap-5 md:grid-cols-2">

                                {{-- Name --}}
                                <div class="md:col-span-2">

                                    <label
                                        for="name"
                                        class="mb-2 block text-sm font-medium text-gray-800"
                                    >
                                        Nama Lengkap
                                    </label>

                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="Masukkan nama lengkap"
                                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#F4B400] focus:ring-2 focus:ring-[#F4B400]/20"
                                    >

                                </div>


                                {{-- Phone --}}
                                <div class="md:col-span-2">

                                    <label
                                        for="phone"
                                        class="mb-2 block text-sm font-medium text-gray-800"
                                    >
                                        Nomor WhatsApp
                                    </label>

                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        required
                                        placeholder="Contoh: 081234567890"
                                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#F4B400] focus:ring-2 focus:ring-[#F4B400]/20"
                                    >

                                </div>


                                {{-- Address --}}
                                <div class="md:col-span-2">

                                    <label
                                        for="address"
                                        class="mb-2 block text-sm font-medium text-gray-800"
                                    >
                                        Alamat Lengkap
                                    </label>

                                    <textarea
                                        id="address"
                                        name="address"
                                        rows="5"
                                        required
                                        placeholder="Nama jalan, nomor rumah, desa/kelurahan, kecamatan, kabupaten/kota, provinsi"
                                        class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#F4B400] focus:ring-2 focus:ring-[#F4B400]/20"
                                    >{{ old('address') }}</textarea>

                                </div>

                            </div>

                        </div>


                        {{-- Payment --}}
                        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm md:p-8">

                            <div class="mb-7">

                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#92400E]">
                                    02
                                </p>

                                <h2 class="mt-2 text-xl font-bold text-[#111827]">
                                    Metode Pembayaran
                                </h2>

                                <p class="mt-1 text-sm text-gray-500">
                                    Pilih metode pembayaran yang tersedia.
                                </p>

                            </div>


                            <div class="space-y-3">

                                {{-- Transfer Bank --}}
                                <label class="group flex cursor-pointer items-center gap-4 rounded-xl border border-gray-200 p-4 transition hover:border-[#F4B400]">

                                    <input
                                        type="radio"
                                        name="payment_method"
                                        value="Transfer Bank"
                                        {{ old('payment_method') === 'Transfer Bank' ? 'checked' : '' }}
                                        required
                                        class="h-4 w-4 accent-[#F4B400]"
                                    >

                                    <div class="flex-1">

                                        <p class="font-medium text-gray-900">
                                            Transfer Bank
                                        </p>

                                        <p class="mt-1 text-xs text-gray-500">
                                            Pembayaran melalui transfer bank.
                                        </p>

                                    </div>

                                </label>


                                {{-- QRIS --}}
                                <label class="group flex cursor-pointer items-center gap-4 rounded-xl border border-gray-200 p-4 transition hover:border-[#F4B400]">

                                    <input
                                        type="radio"
                                        name="payment_method"
                                        value="QRIS"
                                        {{ old('payment_method') === 'QRIS' ? 'checked' : '' }}
                                        class="h-4 w-4 accent-[#F4B400]"
                                    >

                                    <div class="flex-1">

                                        <p class="font-medium text-gray-900">
                                            QRIS
                                        </p>

                                        <p class="mt-1 text-xs text-gray-500">
                                            Bayar menggunakan QRIS.
                                        </p>

                                    </div>

                                </label>


                                {{-- COD --}}
                                <label class="group flex cursor-pointer items-center gap-4 rounded-xl border border-gray-200 p-4 transition hover:border-[#F4B400]">

                                    <input
                                        type="radio"
                                        name="payment_method"
                                        value="COD"
                                        {{ old('payment_method') === 'COD' ? 'checked' : '' }}
                                        class="h-4 w-4 accent-[#F4B400]"
                                    >

                                    <div class="flex-1">

                                        <p class="font-medium text-gray-900">
                                            COD
                                        </p>

                                        <p class="mt-1 text-xs text-gray-500">
                                            Bayar saat pesanan diterima.
                                        </p>

                                    </div>

                                </label>

                            </div>

                        </div>

                    </div>


                    {{-- RIGHT --}}
                    <div class="lg:col-span-1">

                        <div class="sticky top-24 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm md:p-7">

                            <div class="mb-6">

                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#92400E]">
                                    03
                                </p>

                                <h2 class="mt-2 text-xl font-bold text-[#111827]">
                                    Ringkasan Pesanan
                                </h2>

                            </div>


                            {{-- Products --}}
                            <div class="max-h-[420px] space-y-5 overflow-y-auto pr-1">

                                @foreach($cart as $item)

                                    <div class="flex gap-3">

                                        <div class="relative h-16 w-16 shrink-0 overflow-hidden rounded-xl bg-gray-100">

                                            @if(!empty($item['image']))

                                                <img
                                                    src="{{ asset('storage/' . $item['image']) }}"
                                                    alt="{{ $item['name'] }}"
                                                    class="h-full w-full object-cover"
                                                >

                                            @else

                                                <div class="flex h-full w-full items-center justify-center text-[10px] text-gray-400">
                                                    No Image
                                                </div>

                                            @endif

                                            <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#111827] px-1 text-[10px] font-semibold text-white">
                                                {{ $item['quantity'] }}
                                            </span>

                                        </div>


                                        <div class="min-w-0 flex-1">

                                            <p class="line-clamp-2 text-sm font-medium text-gray-900">
                                                {{ $item['name'] }}
                                            </p>

                                            <p class="mt-1 text-xs text-gray-500">
                                                Rp {{ number_format($item['price'], 0, ',', '.') }}
                                            </p>

                                        </div>


                                        <p class="text-sm font-semibold text-gray-900">
                                            Rp
                                            {{ number_format(
                                                $item['price'] * $item['quantity'],
                                                0,
                                                ',',
                                                '.'
                                            ) }}
                                        </p>

                                    </div>

                                @endforeach

                            </div>


                            {{-- Summary --}}
                            <div class="mt-7 space-y-4 border-t border-gray-200 pt-6">

                                <div class="flex justify-between text-sm">

                                    <span class="text-gray-500">
                                        Subtotal
                                    </span>

                                    <span class="font-medium text-gray-900">
                                        Rp {{ number_format($total, 0, ',', '.') }}
                                    </span>

                                </div>


                                <div class="flex justify-between text-sm">

                                    <span class="text-gray-500">
                                        Pengiriman
                                    </span>

                                    <span class="font-medium text-green-600">
                                        Gratis
                                    </span>

                                </div>


                                <div class="flex items-end justify-between border-t border-gray-200 pt-5">

                                    <div>

                                        <p class="text-sm text-gray-500">
                                            Total
                                        </p>

                                        <p class="mt-1 text-2xl font-bold text-[#111827]">
                                            Rp {{ number_format($total, 0, ',', '.') }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Submit --}}
                            <button
                                type="submit"
                                class="mt-7 w-full rounded-full bg-[#111827] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#F4B400] hover:text-[#111827] focus:outline-none focus:ring-2 focus:ring-[#F4B400] focus:ring-offset-2"
                            >
                                Konfirmasi Pesanan
                            </button>


                            {{-- Back --}}
                            <a
                                href="{{ route('cart.index') }}"
                                class="mt-3 block w-full rounded-full border border-gray-300 bg-white px-6 py-3.5 text-center text-sm font-semibold text-gray-800 transition hover:border-[#F4B400] hover:text-[#92400E]"
                            >
                                Kembali ke Keranjang
                            </a>


                            {{-- Trust --}}
                            <div class="mt-6 border-t border-gray-100 pt-5">

                                <div class="space-y-3 text-xs text-gray-500">

                                    <div class="flex items-center gap-3">
                                        <span class="text-base">🔒</span>
                                        <span>Data kamu diproses dengan aman.</span>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <span class="text-base">🚚</span>
                                        <span>Pengiriman aman dan terpercaya.</span>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <span class="text-base">💬</span>
                                        <span>Customer service siap membantu.</span>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        @endif

    </div>

</div>

@endsection