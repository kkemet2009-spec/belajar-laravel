<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Jersey Store')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        nav {
            background: #111;
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .menu a {
            color: white;
            text-decoration: none;
        }

        .menu a:hover {
            color: #aaa;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 40px 20px;
        }

        .btn {
            display: inline-block;
            background: #111;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #333;
        }

        footer {
            margin-top: 60px;
            background: #111;
            color: white;
            text-align: center;
            padding: 25px;
        }

        @media (max-width: 700px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }

            .menu {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav>

        <div class="logo">
            ⚽ Jersey Store
        </div>

        <div class="menu">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('public.products.index') }}">
                Produk
            </a>

            <a href="{{ route('public.articles.index') }}">
                Artikel
            </a>

            <a href="{{ route('contact') }}">
                Kontak
            </a>

            @auth
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            @endauth

        </div>

    </nav>


    {{-- ISI HALAMAN --}}
    @yield('content')


    {{-- FOOTER --}}
    <footer>

        <p>
            © {{ date('Y') }} Jersey Store.
            All Rights Reserved.
        </p>

    </footer>

</body>
</html>