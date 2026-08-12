@extends('layouts.admin')

@section('title', 'Tambah Artikel')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .article-create {
        max-width: 1100px;
        margin: 0 auto;
        padding: 30px 15px 60px;
    }

    /* =========================
       HEADER
    ========================= */

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 750;
        color: #111827;
    }

    .page-header p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 15px;
    }


    /* =========================
       CARD
    ========================= */

    .form-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .card-header {
        padding: 24px 30px;
        border-bottom: 1px solid #eef0f3;

        display: flex;
        align-items: center;
        gap: 14px;
    }

    .header-icon {
        width: 48px;
        height: 48px;

        border-radius: 13px;

        background: #eff6ff;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 23px;
    }

    .card-header h2 {
        margin: 0;

        font-size: 19px;
        color: #111827;
    }

    .card-header span {
        display: block;

        margin-top: 4px;

        font-size: 13px;
        color: #6b7280;
    }


    /* =========================
       BODY
    ========================= */

    .card-body {
        padding: 30px;
    }


    /* =========================
       FORM
    ========================= */

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;

        margin-bottom: 8px;

        font-size: 14px;
        font-weight: 650;

        color: #111827;
    }

    .required {
        color: #ef4444;
    }

    .form-control {
        width: 100%;

        padding: 13px 15px;

        border: 1px solid #d1d5db;

        border-radius: 10px;

        background: #ffffff;

        color: #111827;

        font-size: 14px;

        outline: none;

        transition: all .2s ease;
    }

    .form-control:hover {
        border-color: #9ca3af;
    }

    .form-control:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37, 99, 235, .10);
    }

    textarea.form-control {
        min-height: 280px;

        resize: vertical;

        line-height: 1.7;
    }

    .help-text {
        margin-top: 7px;

        font-size: 12px;

        color: #6b7280;
    }


    /* =========================
       UPLOAD
    ========================= */

    .upload-box {
        position: relative;

        min-height: 230px;

        border: 2px dashed #cbd5e1;

        border-radius: 15px;

        background: #f8fafc;

        display: flex;

        align-items: center;

        justify-content: center;

        text-align: center;

        cursor: pointer;

        transition: all .2s ease;

        overflow: hidden;
    }

    .upload-box:hover {
        border-color: #2563eb;

        background: #eff6ff;
    }

    .upload-box.dragover {
        border-color: #2563eb;

        background: #dbeafe;

        transform: scale(1.01);
    }

    .upload-content {
        pointer-events: none;

        padding: 25px;
    }

    .upload-icon {
        width: 60px;
        height: 60px;

        margin: 0 auto 14px;

        border-radius: 16px;

        background: #dbeafe;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 28px;
    }

    .upload-title {
        font-size: 16px;

        font-weight: 700;

        color: #111827;
    }

    .upload-description {
        margin-top: 6px;

        font-size: 13px;

        color: #6b7280;
    }

    .upload-button {
        display: inline-block;

        margin-top: 15px;

        padding: 9px 17px;

        border-radius: 8px;

        background: #2563eb;

        color: white;

        font-size: 13px;

        font-weight: 600;
    }

    #imageInput {
        display: none;
    }


    /* =========================
       PREVIEW
    ========================= */

    .preview-box {
        display: none;

        margin-top: 18px;

        border: 1px solid #e5e7eb;

        border-radius: 14px;

        overflow: hidden;

        background: white;
    }

    .preview-top {
        padding: 13px 16px;

        border-bottom: 1px solid #eef0f3;

        display: flex;

        justify-content: space-between;

        align-items: center;
    }

    .preview-title {
        font-size: 14px;

        font-weight: 650;

        color: #111827;
    }

    .remove-button {
        border: none;

        padding: 7px 11px;

        border-radius: 7px;

        background: #fee2e2;

        color: #dc2626;

        font-size: 12px;

        font-weight: 600;

        cursor: pointer;
    }

    .remove-button:hover {
        background: #fecaca;
    }

    .preview-image-container {
        padding: 18px;

        background: #f8fafc;

        text-align: center;
    }

    #imagePreview {
        display: block;

        width: 100%;

        max-height: 430px;

        object-fit: contain;

        border-radius: 10px;
    }

    .file-info {
        padding: 12px 16px;

        border-top: 1px solid #eef0f3;

        color: #6b7280;

        font-size: 12px;
    }


    /* =========================
       ERROR
    ========================= */

    .error-alert {
        margin-bottom: 25px;

        padding: 15px 18px;

        border-radius: 10px;

        border: 1px solid #fecaca;

        background: #fef2f2;

        color: #991b1b;

        font-size: 14px;
    }

    .error-alert ul {
        margin: 8px 0 0 18px;

        padding: 0;
    }


    /* =========================
       FOOTER
    ========================= */

    .card-footer {
        padding: 20px 30px;

        background: #fafafa;

        border-top: 1px solid #eef0f3;

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;
    }

    .footer-info {
        font-size: 12px;

        color: #6b7280;
    }

    .button-group {
        display: flex;

        gap: 10px;
    }

    .btn {
        border: none;

        padding: 11px 19px;

        border-radius: 9px;

        font-size: 14px;

        font-weight: 650;

        cursor: pointer;

        text-decoration: none;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        transition: all .2s ease;
    }

    .btn-primary {
        background: #2563eb;

        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;

        transform: translateY(-1px);
    }

    .btn-secondary {
        background: #e5e7eb;

        color: #374151;
    }

    .btn-secondary:hover {
        background: #d1d5db;
    }

    .btn.loading {
        opacity: .7;

        pointer-events: none;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 700px) {

        .article-create {
            padding: 20px 5px 40px;
        }

        .card-header,
        .card-body,
        .card-footer {
            padding: 20px;
        }

        .card-footer {
            flex-direction: column;

            align-items: stretch;
        }

        .button-group {
            width: 100%;

            flex-direction: column;
        }

        .btn {
            width: 100%;
        }

        .page-header h1 {
            font-size: 25px;
        }
    }

</style>


<div class="article-create">


    {{-- =========================
         HEADER
    ========================= --}}

    <div class="page-header">

        <h1>
            Tambah Artikel
        </h1>

        <p>
            Buat dan publikasikan artikel terbaru untuk pengunjung Jersey Store.
        </p>

    </div>


    {{-- =========================
         CARD
    ========================= --}}

    <div class="form-card">


        {{-- CARD HEADER --}}

        <div class="card-header">

            <div class="header-icon">
                📰
            </div>

            <div>

                <h2>
                    Informasi Artikel
                </h2>

                <span>
                    Lengkapi informasi artikel sebelum dipublikasikan.
                </span>

            </div>

        </div>


        {{-- BODY --}}

        <div class="card-body">


            {{-- ERROR --}}

            @if ($errors->any())

                <div class="error-alert">

                    <strong>
                        Data belum dapat disimpan.
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                id="articleForm"
                action="{{ route('articles.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- =========================
                     JUDUL
                ========================= --}}

                <div class="form-group">

                    <label
                        for="title"
                        class="form-label"
                    >

                        Judul Artikel

                        <span class="required">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        placeholder="Contoh: 5 Jersey Bola Terbaik Tahun 2026"
                        required
                    >

                </div>


                {{-- =========================
                     SLUG
                ========================= --}}

                <div class="form-group">

                    <label
                        for="slug"
                        class="form-label"
                    >

                        Slug

                        <span class="required">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="slug"
                        id="slug"
                        class="form-control"
                        value="{{ old('slug') }}"
                        placeholder="Contoh: jersey-bola-terbaik-2026"
                        required
                    >

                    <div class="help-text">
                        Slug digunakan sebagai alamat URL artikel.
                        Contoh: jersey-bola-terbaik-2026
                    </div>

                </div>


                {{-- =========================
                     FOTO
                ========================= --}}

                <div class="form-group">

                    <label class="form-label">

                        Foto Artikel

                        <span class="required">
                            *
                        </span>

                    </label>


                    <label
                        for="imageInput"
                        class="upload-box"
                        id="uploadBox"
                    >

                        <div class="upload-content">

                            <div class="upload-icon">
                                🖼️
                            </div>

                            <div class="upload-title">
                                Pilih Foto Artikel
                            </div>

                            <div class="upload-description">
                                Klik untuk memilih gambar atau drag & drop
                            </div>

                            <div class="upload-button">
                                Pilih Gambar
                            </div>

                        </div>

                    </label>


                    <input
                        type="file"
                        name="image"
                        id="imageInput"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        required
                    >


                    {{-- PREVIEW --}}

                    <div
                        class="preview-box"
                        id="previewBox"
                    >

                        <div class="preview-top">

                            <div class="preview-title">
                                Preview Foto
                            </div>

                            <button
                                type="button"
                                class="remove-button"
                                id="removeImage"
                            >
                                Hapus Foto
                            </button>

                        </div>


                        <div class="preview-image-container">

                            <img
                                id="imagePreview"
                                src=""
                                alt="Preview Foto Artikel"
                            >

                        </div>


                        <div
                            class="file-info"
                            id="fileInfo"
                        ></div>

                    </div>


                    <div class="help-text">

                        Format:
                        JPG, JPEG, PNG, WEBP

                        ·

                        Maksimal 2 MB

                    </div>

                </div>


                {{-- =========================
                     CONTENT
                ========================= --}}

                <div class="form-group">

                    <label
                        for="content"
                        class="form-label"
                    >

                        Isi Artikel

                        <span class="required">
                            *
                        </span>

                    </label>

                    <textarea
                        name="content"
                        id="content"
                        class="form-control"
                        placeholder="Tulis isi artikel di sini..."
                        required
                    >{{ old('content') }}</textarea>

                    <div class="help-text">
                        Tulis artikel dengan jelas dan informatif.
                    </div>

                </div>


                {{-- =========================
                     FOOTER
                ========================= --}}

                <div class="card-footer">

                    <div class="footer-info">

                        <span class="required">
                            *
                        </span>

                        Wajib diisi

                    </div>


                    <div class="button-group">

                        <a
                            href="{{ route('articles.index') }}"
                            class="btn btn-secondary"
                        >
                            ← Batal
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                            id="submitButton"
                        >

                            💾

                            Simpan Artikel

                        </button>

                    </div>

                </div>


            </form>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const imageInput =
        document.getElementById('imageInput');

    const imagePreview =
        document.getElementById('imagePreview');

    const previewBox =
        document.getElementById('previewBox');

    const fileInfo =
        document.getElementById('fileInfo');

    const removeImage =
        document.getElementById('removeImage');

    const uploadBox =
        document.getElementById('uploadBox');

    const articleForm =
        document.getElementById('articleForm');

    const submitButton =
        document.getElementById('submitButton');


    /*
    |--------------------------------------------------------------------------
    | SETTINGS
    |--------------------------------------------------------------------------
    */

    const MAX_SIZE =
        2 * 1024 * 1024;


    const allowedTypes = [

        'image/jpeg',

        'image/jpg',

        'image/png',

        'image/webp'

    ];


    /*
    |--------------------------------------------------------------------------
    | FORMAT SIZE
    |--------------------------------------------------------------------------
    */

    function formatFileSize(bytes) {

        if (bytes < 1024) {

            return bytes + ' B';

        }

        if (bytes < 1024 * 1024) {

            return (
                bytes / 1024
            ).toFixed(1) + ' KB';

        }

        return (
            bytes /
            (1024 * 1024)
        ).toFixed(2) + ' MB';

    }


    /*
    |--------------------------------------------------------------------------
    | SHOW IMAGE
    |--------------------------------------------------------------------------
    */

    function showImage(file) {


        if (!file) {

            return;

        }


        /*
        | TYPE
        */

        if (!allowedTypes.includes(file.type)) {

            alert(
                'Format gambar tidak didukung.\n\n' +
                'Gunakan JPG, JPEG, PNG atau WEBP.'
            );

            imageInput.value = '';

            previewBox.style.display = 'none';

            return;

        }


        /*
        | SIZE
        */

        if (file.size > MAX_SIZE) {

            alert(
                'Ukuran gambar terlalu besar.\n\n' +
                'Maksimal 2 MB.'
            );

            imageInput.value = '';

            previewBox.style.display = 'none';

            return;

        }


        /*
        | READER
        */

        const reader =
            new FileReader();


        reader.onload =
            function (event) {


                imagePreview.src =
                    event.target.result;


                previewBox.style.display =
                    'block';


                fileInfo.textContent =
                    file.name +
                    ' · ' +
                    formatFileSize(
                        file.size
                    );

            };


        reader.readAsDataURL(file);

    }


    /*
    |--------------------------------------------------------------------------
    | SELECT IMAGE
    |--------------------------------------------------------------------------
    */

    imageInput.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];

            showImage(file);

        }
    );


    /*
    |--------------------------------------------------------------------------
    | REMOVE IMAGE
    |--------------------------------------------------------------------------
    */

    removeImage.addEventListener(
        'click',
        function () {

            imageInput.value = '';

            imagePreview.src = '';

            fileInfo.textContent = '';

            previewBox.style.display =
                'none';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | DRAG OVER
    |--------------------------------------------------------------------------
    */

    uploadBox.addEventListener(
        'dragover',
        function (event) {

            event.preventDefault();

            uploadBox.classList.add(
                'dragover'
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | DRAG LEAVE
    |--------------------------------------------------------------------------
    */

    uploadBox.addEventListener(
        'dragleave',
        function () {

            uploadBox.classList.remove(
                'dragover'
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | DROP
    |--------------------------------------------------------------------------
    */

    uploadBox.addEventListener(
        'drop',
        function (event) {

            event.preventDefault();

            uploadBox.classList.remove(
                'dragover'
            );


            const files =
                event.dataTransfer.files;


            if (files.length > 0) {

                imageInput.files =
                    files;

                showImage(
                    files[0]
                );

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | SUBMIT
    |--------------------------------------------------------------------------
    */

    articleForm.addEventListener(
        'submit',
        function () {

            submitButton.classList.add(
                'loading'
            );

            submitButton.innerHTML =
                '⏳ Menyimpan...';

        }
    );


});

</script>

@endsection