@extends('layouts.admin')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .article-create-page {
        min-height: calc(100vh - 80px);
        padding: 40px 24px 60px;
        background: #f4f6f9;
    }

    .article-create-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .article-card {
        background: #ffffff;
        border-radius: 22px;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }

    .article-header {
        padding: 32px 36px 26px;
        border-bottom: 1px solid #edf0f4;
    }

    .article-header-top {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .article-header-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef4ff;
        font-size: 27px;
    }

    .article-header h1 {
        margin: 0;
        color: #111827;
        font-size: 32px;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .article-header p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .article-form {
        padding: 34px 36px 36px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        margin-bottom: 9px;
        color: #111827;
        font-size: 15px;
        font-weight: 700;
    }

    .required {
        color: #ef4444;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        border: 1px solid #d9dee7;
        border-radius: 12px;
        background: #ffffff;
        color: #111827;
        font-size: 15px;
        outline: none;
        transition: all 0.2s ease;
    }

    .form-input {
        height: 48px;
        padding: 0 14px;
    }

    .form-textarea {
        min-height: 230px;
        padding: 14px;
        resize: vertical;
        line-height: 1.7;
    }

    .form-input:focus,
    .form-textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.10);
    }

    .form-help {
        margin-top: 7px;
        color: #6b7280;
        font-size: 13px;
    }

    .error-message {
        margin-top: 7px;
        color: #dc2626;
        font-size: 13px;
        font-weight: 600;
    }

    /* =========================
       FOTO ARTIKEL
    ========================= */

    .upload-area {
        position: relative;
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        background: #f8fafc;
        padding: 28px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .upload-area:hover {
        border-color: #2563eb;
        background: #f5f8ff;
    }

    .upload-area.dragover {
        border-color: #2563eb;
        background: #eff6ff;
    }

    .upload-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 13px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8f0ff;
        font-size: 28px;
    }

    .upload-title {
        color: #111827;
        font-size: 16px;
        font-weight: 700;
    }

    .upload-subtitle {
        margin-top: 6px;
        color: #64748b;
        font-size: 13px;
    }

    .upload-button {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 18px;
        border-radius: 9px;
        background: #2563eb;
        color: #ffffff;
        font-size: 14px;
        font-weight: 700;
    }

    #foto_artikel {
        display: none;
    }

    /* PREVIEW */

    .preview-box {
        display: none;
        margin-top: 20px;
        padding: 18px;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        background: #f8fafc;
    }

    .preview-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .preview-title {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #111827;
        font-size: 15px;
        font-weight: 800;
    }

    .remove-image {
        border: 0;
        padding: 8px 12px;
        border-radius: 9px;
        background: #fee2e2;
        color: #dc2626;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s;
    }

    .remove-image:hover {
        background: #fecaca;
    }

    .preview-image-wrapper {
        min-height: 260px;
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    .preview-image {
        display: block;
        max-width: 100%;
        max-height: 430px;
        width: auto;
        height: auto;
        object-fit: contain;
        border-radius: 10px;
    }

    .preview-info {
        margin-top: 12px;
        text-align: center;
        color: #64748b;
        font-size: 13px;
        word-break: break-word;
    }

    /* BUTTON */

    .form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #edf0f4;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 46px;
        padding: 0 20px;
        border: 0;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background: #111827;
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #2563eb;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #d1d5db;
    }

    /* RESPONSIVE */

    @media (max-width: 700px) {

        .article-create-page {
            padding: 20px 12px 40px;
        }

        .article-header {
            padding: 25px 20px;
        }

        .article-form {
            padding: 25px 20px;
        }

        .article-header h1 {
            font-size: 26px;
        }

        .article-header-icon {
            width: 45px;
            height: 45px;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn {
            width: 100%;
        }

        .upload-area {
            padding: 22px 15px;
        }
    }
</style>


<div class="article-create-page">

    <div class="article-create-container">

        <div class="article-card">

            {{-- HEADER --}}
            <div class="article-header">

                <div class="article-header-top">

                    <div class="article-header-icon">
                        📰
                    </div>

                    <div>
                        <h1>Tambah Artikel</h1>

                        <p>
                            Buat artikel baru untuk dibagikan kepada pengunjung Jersey Store.
                        </p>
                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('articles.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="article-form"
                id="articleForm"
            >

                @csrf


                {{-- JUDUL --}}
                <div class="form-group">

                    <label
                        for="judul"
                        class="form-label"
                    >
                        Judul Artikel <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="form-input"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: 5 Jersey Bola Terbaik Tahun 2026"
                        required
                    >

                    @error('judul')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- SLUG --}}
                <div class="form-group">

                    <label
                        for="slug"
                        class="form-label"
                    >
                        Slug <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        class="form-input"
                        value="{{ old('slug') }}"
                        placeholder="contoh-5-jersey-bola-terbaik-2026"
                        required
                    >

                    <div class="form-help">
                        Slug digunakan sebagai alamat URL artikel.
                    </div>

                    @error('slug')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- FOTO ARTIKEL --}}
                <div class="form-group">

                    <label class="form-label">
                        Foto Artikel <span class="required">*</span>
                    </label>


                    {{-- UPLOAD AREA --}}
                    <label
                        for="foto_artikel"
                        class="upload-area"
                        id="uploadArea"
                    >

                        <div class="upload-icon">
                            🖼️
                        </div>

                        <div class="upload-title">
                            Pilih Foto Artikel
                        </div>

                        <div class="upload-subtitle">
                            Klik area ini untuk memilih gambar
                        </div>

                        <div class="upload-button">
                            Pilih Gambar
                        </div>

                    </label>


                    {{-- INPUT FILE --}}
                    <input
                        type="file"
                        id="foto_artikel"
                        name="foto"
                        accept="image/jpeg,image/png,image/webp,.jpg,.jpeg,.png,.webp"
                        required
                    >


                    <div class="form-help">
                        Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </div>


                    {{-- PREVIEW --}}
                    <div
                        class="preview-box"
                        id="previewBox"
                    >

                        <div class="preview-header">

                            <div class="preview-title">
                                🖼️ Preview Foto
                            </div>

                            <button
                                type="button"
                                class="remove-image"
                                id="hapusFoto"
                            >
                                ✕ Hapus
                            </button>

                        </div>


                        <div class="preview-image-wrapper">

                            <img
                                src=""
                                alt="Preview Foto Artikel"
                                id="previewFoto"
                                class="preview-image"
                            >

                        </div>


                        <div
                            class="preview-info"
                            id="namaFoto"
                        ></div>

                    </div>


                    @error('foto')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- ISI ARTIKEL --}}
                <div class="form-group">

                    <label
                        for="isi"
                        class="form-label"
                    >
                        Isi Artikel <span class="required">*</span>
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        class="form-textarea"
                        placeholder="Tulis isi artikel di sini..."
                        required
                    >{{ old('isi') }}</textarea>

                    <div class="form-help">
                        Tulis informasi artikel dengan jelas dan mudah dipahami.
                    </div>

                    @error('isi')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        💾 Simpan Artikel
                    </button>

                    <a
                        href="{{ route('articles.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ================================
     JAVASCRIPT
================================ --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    console.log('Create Article JS aktif');


    /* =============================
       ELEMENT
    ============================= */

    const judul = document.getElementById('judul');

    const slug = document.getElementById('slug');

    const inputFoto = document.getElementById('foto_artikel');

    const previewBox = document.getElementById('previewBox');

    const previewFoto = document.getElementById('previewFoto');

    const namaFoto = document.getElementById('namaFoto');

    const hapusFoto = document.getElementById('hapusFoto');

    const uploadArea = document.getElementById('uploadArea');


    let previewUrl = null;


    /* =============================
       SLUG OTOMATIS
    ============================= */

    if (judul && slug) {

        judul.addEventListener('input', function () {

            /*
             * Jangan otomatis mengubah slug
             * kalau user sudah mengisinya sendiri.
             */
            if (slug.dataset.manual === 'true') {
                return;
            }

            let value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            slug.value = value;

        });


        slug.addEventListener('input', function () {

            this.dataset.manual = 'true';

        });

    }


    /* =============================
       FUNGSI PREVIEW GAMBAR
    ============================= */

    function tampilkanPreview(file) {

        if (!file) {
            return;
        }


        console.log('File dipilih:', file.name);

        console.log('Tipe:', file.type);

        console.log('Ukuran:', file.size);


        /* VALIDASI FORMAT */

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];


        if (!allowedTypes.includes(file.type)) {

            alert(
                'Format gambar tidak didukung.\n\n' +
                'Gunakan JPG, JPEG, PNG, atau WEBP.'
            );

            inputFoto.value = '';

            sembunyikanPreview();

            return;

        }


        /* VALIDASI UKURAN */

        const maxSize = 2 * 1024 * 1024;


        if (file.size > maxSize) {

            alert(
                'Ukuran gambar terlalu besar.\n\n' +
                'Maksimal ukuran gambar adalah 2 MB.'
            );

            inputFoto.value = '';

            sembunyikanPreview();

            return;

        }


        /* HAPUS URL LAMA */

        if (previewUrl) {

            URL.revokeObjectURL(previewUrl);

        }


        /* BUAT URL BARU */

        previewUrl = URL.createObjectURL(file);


        console.log(
            'Preview URL:',
            previewUrl
        );


        /* SET IMAGE */

        previewFoto.onload = function () {

            console.log(
                'Gambar berhasil dimuat ke preview'
            );

            previewBox.style.display = 'block';

        };


        previewFoto.onerror = function () {

            console.error(
                'Gagal memuat gambar preview'
            );

            alert(
                'Gambar tidak dapat ditampilkan.'
            );

            sembunyikanPreview();

        };


        previewFoto.src = previewUrl;


        /* INFORMASI FILE */

        const ukuranKB =
            (file.size / 1024).toFixed(1);


        namaFoto.textContent =
            file.name +
            ' • ' +
            ukuranKB +
            ' KB';


        /* TAMPILKAN BOX */

        previewBox.style.display = 'block';

    }


    /* =============================
       SEMBUNYIKAN PREVIEW
    ============================= */

    function sembunyikanPreview() {

        previewBox.style.display = 'none';

        previewFoto.src = '';

        namaFoto.textContent = '';

    }


    /* =============================
       INPUT FILE
    ============================= */

    if (inputFoto) {

        inputFoto.addEventListener(
            'change',
            function () {

                const file =
                    this.files &&
                    this.files[0];

                tampilkanPreview(file);

            }
        );

    }


    /* =============================
       TOMBOL HAPUS
    ============================= */

    if (hapusFoto) {

        hapusFoto.addEventListener(
            'click',
            function () {

                console.log(
                    'Preview dihapus'
                );


                if (previewUrl) {

                    URL.revokeObjectURL(
                        previewUrl
                    );

                    previewUrl = null;

                }


                inputFoto.value = '';

                previewFoto.src = '';

                namaFoto.textContent = '';

                previewBox.style.display =
                    'none';

            }
        );

    }


    /* =============================
       DRAG & DROP
    ============================= */

    if (uploadArea) {

        uploadArea.addEventListener(
            'dragover',
            function (event) {

                event.preventDefault();

                uploadArea.classList.add(
                    'dragover'
                );

            }
        );


        uploadArea.addEventListener(
            'dragleave',
            function () {

                uploadArea.classList.remove(
                    'dragover'
                );

            }
        );


        uploadArea.addEventListener(
            'drop',
            function (event) {

                event.preventDefault();

                uploadArea.classList.remove(
                    'dragover'
                );


                const files =
                    event.dataTransfer.files;


                if (
                    files &&
                    files.length > 0
                ) {

                    const file = files[0];


                    /*
                     * Masukkan file ke input
                     * menggunakan DataTransfer.
                     */

                    try {

                        const dataTransfer =
                            new DataTransfer();

                        dataTransfer.items.add(
                            file
                        );

                        inputFoto.files =
                            dataTransfer.files;

                    } catch (error) {

                        console.error(
                            'DataTransfer error:',
                            error
                        );

                    }


                    tampilkanPreview(file);

                }

            }
        );

    }


    /* =============================
       BERSIHKAN URL SAAT KELUAR
    ============================= */

    window.addEventListener(
        'beforeunload',
        function () {

            if (previewUrl) {

                URL.revokeObjectURL(
                    previewUrl
                );

            }

        }
    );


});

</script>

@endsection