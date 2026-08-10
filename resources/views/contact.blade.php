@extends('layouts.app')

@section('title', 'Kontak - Jersey Store')

@section('content')

<div class="container">

    <div style="
        background:white;
        padding:40px;
        border-radius:15px;
        box-shadow:0 8px 25px rgba(0,0,0,0.08);
    ">

        <h1>Hubungi Kami 📞</h1>

        <p style="color:#666; margin-top:10px; margin-bottom:35px;">
            Ada pertanyaan mengenai produk jersey kami?
            Silakan hubungi Jersey Store.
        </p>

        <div style="
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:25px;
        ">

            <div>

                <div style="
                    background:#f5f5f5;
                    padding:25px;
                    border-radius:12px;
                ">
                    <h3>📍 Alamat</h3>

                    <p style="margin-top:10px; color:#555;">
                        Jersey Store<br>
                        Indonesia
                    </p>
                </div>

                <br>

                <div style="
                    background:#f5f5f5;
                    padding:25px;
                    border-radius:12px;
                ">
                    <h3>📱 WhatsApp</h3>

                    <p style="margin-top:10px; color:#555;">
                        08xxxxxxxxxx
                    </p>
                </div>

                <br>

                <div style="
                    background:#f5f5f5;
                    padding:25px;
                    border-radius:12px;
                ">
                    <h3>📧 Email</h3>

                    <p style="margin-top:10px; color:#555;">
                        jersey-store@gmail.com
                    </p>
                </div>

            </div>

            <div>

                <form>

                    <div style="margin-bottom:18px;">
                        <label>Nama</label>

                        <input
                            type="text"
                            placeholder="Masukkan nama"
                            style="
                                width:100%;
                                padding:13px;
                                margin-top:7px;
                                border:1px solid #ddd;
                                border-radius:8px;
                            "
                        >
                    </div>

                    <div style="margin-bottom:18px;">
                        <label>Email</label>

                        <input
                            type="email"
                            placeholder="Masukkan email"
                            style="
                                width:100%;
                                padding:13px;
                                margin-top:7px;
                                border:1px solid #ddd;
                                border-radius:8px;
                            "
                        >
                    </div>

                    <div style="margin-bottom:18px;">
                        <label>Pesan</label>

                        <textarea
                            placeholder="Tulis pesan Anda..."
                            style="
                                width:100%;
                                height:130px;
                                padding:13px;
                                margin-top:7px;
                                border:1px solid #ddd;
                                border-radius:8px;
                                resize:vertical;
                            "
                        ></textarea>
                    </div>

                    <button type="button">
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection