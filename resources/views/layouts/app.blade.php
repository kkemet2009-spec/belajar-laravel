<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Jersey Store')
    </title>

    {{-- FAVICON --}}
    @include('components.favicon')

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- PAGE CSS --}}
    @stack('styles')

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;

            min-height: 100vh;

            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #f8fafc;
            color: #111827;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        img {
            max-width: 100%;
        }

        /* ==========================================
           MAIN CONTENT
        ========================================== */

        .js-main {
            width: 100%;
            min-height: calc(100vh - 72px);
        }

        /* ==========================================
           FOOTER
        ========================================== */

        .js-footer {
            margin-top: 60px;

            background: #111827;
            color: #ffffff;
        }

        .js-footer-container {
            max-width: 1200px;
            margin: 0 auto;

            padding: 45px 24px 25px;

            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
        }

        .js-footer-brand {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .js-footer-title {
            font-size: 22px;
            font-weight: 800;
            margin: 0;
            color: #ffffff;
        }

        .js-footer-description {
            max-width: 450px;

            margin: 0;

            color: #cbd5e1;

            font-size: 14px;
            line-height: 1.7;
        }

        .js-footer-heading {
            margin: 0 0 15px;

            font-size: 15px;
            font-weight: 700;
            color: #e5e7eb;
        }

        .js-footer-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .js-footer-links a {
            color: #cbd5e1;

            font-size: 14px;

            transition: color 0.2s ease;
        }

        .js-footer-links a:hover {
            color: #ffffff;
        }

        .js-footer-bottom {
            max-width: 1200px;
            margin: 0 auto;

            padding: 18px 24px;

            border-top: 1px solid rgba(255, 255, 255, 0.1);

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .js-footer-bottom p {
            margin: 0;

            color: #94a3b8;

            font-size: 13px;
        }

        /* ==========================================
           RESPONSIVE FOOTER
        ========================================== */

        @media (max-width: 768px) {

            .js-footer-container {
                grid-template-columns: 1fr;
                gap: 30px;

                padding: 35px 20px 20px;
            }

            .js-footer-bottom {
                padding: 16px 20px;

                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>


<body>

    {{-- ==========================================
         PUBLIC NAVBAR
    ========================================== --}}

    @include('components.navbar')


    {{-- ==========================================
         MAIN CONTENT
    ========================================== --}}

    <main class="js-main">

        @yield('content')

    </main>


    {{-- ==========================================
         FOOTER
    ========================================== --}}

    <footer class="js-footer">

        <div class="js-footer-container">

            {{-- BRAND --}}
            <div class="js-footer-brand">

                <h2 class="js-footer-title">
                    Jersey Store
                </h2>

                <p class="js-footer-description">
                    Jersey pilihan untuk pecinta sepak bola.
                </p>

            </div>


            {{-- SHOP --}}
            <div>

                <h3 class="js-footer-heading">
                    Shop
                </h3>

                <div class="js-footer-links">

                    <a href="{{ route('public.products.index') }}">
                        Produk
                    </a>

                    <a href="{{ route('public.articles.index') }}">
                        Artikel
                    </a>

                </div>

            </div>


            {{-- COMPANY --}}
            <div>

                <h3 class="js-footer-heading">
                    Company
                </h3>

                <div class="js-footer-links">

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <a href="{{ route('kontak') }}">
                        Kontak
                    </a>

                </div>

            </div>

        </div>


        {{-- FOOTER BOTTOM --}}

        <div class="js-footer-bottom">

            <p>
                © {{ date('Y') }} Jersey Store. All rights reserved.
            </p>

        </div>

    </footer>


    {{-- PAGE JAVASCRIPT --}}
    @stack('scripts')

</body>

</html>