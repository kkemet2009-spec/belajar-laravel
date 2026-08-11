@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="mb-8">
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 mb-4">
                ← Kembali ke Produk
            </a>

            <h1 class="text-3xl font-bold text-gray-900">
                Tambah Produk
            </h1>

            <p class="mt-2 text-gray-600">
                Tambahkan produk jersey baru ke Jersey Store.
            </p>
        </div>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">
                <div class="font-semibold text-red-800 mb-2">
                    Produk gagal disimpan.
                </div>

                <ul class="list-disc list-inside text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">
                    Informasi Produk
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Isi semua informasi produk dengan lengkap.
                </p>
            </div>

            <form action="{{ route('products.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- NAMA PRODUK --}}
                    <div class="md:col-span-2">

                        <label for="name"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Jersey Real Madrid Home 2026"
                            required
                            class="w-full rounded-xl border-gray-300 focus:border-gray-900 focus:ring-gray-900"
                        >

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- HARGA --}}
                    <div>

                        <label for="price"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Harga
                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                Rp
                            </span>

                            <input
                                type="number"
                                name="price"
                                id="price"
                                value="{{ old('price') }}"
                                placeholder="150000"
                                min="0"
                                required
                                class="w-full pl-12 rounded-xl border-gray-300 focus:border-gray-900 focus:ring-gray-900"
                            >

                        </div>

                        @error('price')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- STOK --}}
                    <div>

                        <label for="stock"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stock"
                            id="stock"
                            value="{{ old('stock') }}"
                            placeholder="10"
                            min="0"
                            required
                            class="w-full rounded-xl border-gray-300 focus:border-gray-900 focus:ring-gray-900"
                        >

                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- KATEGORI --}}
                    <div>

                        <label for="category"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori
                        </label>

                        <select
                            name="category"
                            id="category"
                            required
                            class="w-full rounded-xl border-gray-300 focus:border-gray-900 focus:ring-gray-900"
                        >

                            <option value="">
                                Pilih kategori
                            </option>

                            <option value="Jersey"
                                {{ old('category') == 'Jersey' ? 'selected' : '' }}>
                                Jersey
                            </option>

                            <option value="Training"
                                {{ old('category') == 'Training' ? 'selected' : '' }}>
                                Training
                            </option>

                            <option value="Retro"
                                {{ old('category') == 'Retro' ? 'selected' : '' }}>
                                Retro
                            </option>

                            <option value="Kids"
                                {{ old('category') == 'Kids' ? 'selected' : '' }}>
                                Kids
                            </option>

                            <option value="Accessories"
                                {{ old('category') == 'Accessories' ? 'selected' : '' }}>
                                Accessories
                            </option>

                        </select>

                        @error('category')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- UKURAN --}}
                    <div>

                        <label for="size"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Ukuran
                        </label>

                        <select
                            name="size"
                            id="size"
                            class="w-full rounded-xl border-gray-300 focus:border-gray-900 focus:ring-gray-900"
                        >

                            <option value="">
                                Pilih ukuran
                            </option>

                            <option value="S"
                                {{ old('size') == 'S' ? 'selected' : '' }}>
                                S
                            </option>

                            <option value="M"
                                {{ old('size') == 'M' ? 'selected' : '' }}>
                                M
                            </option>

                            <option value="L"
                                {{ old('size') == 'L' ? 'selected' : '' }}>
                                L
                            </option>

                            <option value="XL"
                                {{ old('size') == 'XL' ? 'selected' : '' }}>
                                XL
                            </option>

                            <option value="XXL"
                                {{ old('size') == 'XXL' ? 'selected' : '' }}>
                                XXL
                            </option>

                        </select>

                        @error('size')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- GAMBAR --}}
                    <div class="md:col-span-2">

                        <label for="image"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Produk
                        </label>

                        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-gray-500 transition">

                            <div class="text-4xl mb-3">
                                📷
                            </div>

                            <p class="text-sm font-medium text-gray-700">
                                Upload gambar jersey
                            </p>

                            <p class="text-xs text-gray-500 mt-1 mb-4">
                                JPG, JPEG, PNG atau WEBP. Maksimal 2MB.
                            </p>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                accept="image/*"
                                class="block w-full text-sm text-gray-600
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:bg-gray-900 file:text-white
                                hover:file:bg-gray-700"
                            >

                        </div>

                        @error('image')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="md:col-span-2">

                        <label for="description"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Produk
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="6"
                            placeholder="Tuliskan deskripsi produk..."
                            class="w-full rounded-xl border-gray-300 focus:border-gray-900 focus:ring-gray-900"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                    <a href="{{ route('products.index') }}"
                       class="inline-flex justify-center items-center px-5 py-3 rounded-xl border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex justify-center items-center px-6 py-3 rounded-xl bg-gray-900 text-white font-semibold hover:bg-gray-700 transition"
                    >
                        + Simpan Produk
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection