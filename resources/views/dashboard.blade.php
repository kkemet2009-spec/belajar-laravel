<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Jersey Store</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
        }

        .navbar {
            background: #111;
            color: white;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .username {
            color: #ddd;
        }

        .logout {
            background: #e53935;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 7px;
            cursor: pointer;
        }

        .logout:hover {
            background: #c62828;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #666;
        }

        .menu {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .menu a {
            text-decoration: none;
            background: #111;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
        }

        .menu a:hover {
            background: #333;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .card h3 {
            color: #666;
            margin-bottom: 15px;
        }

        .number {
            font-size: 40px;
            font-weight: bold;
        }

        .card a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background: #111;
            padding: 10px 16px;
            border-radius: 7px;
        }

        footer {
            margin-top: 60px;
            background: #111;
            color: white;
            text-align: center;
            padding: 25px;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 0 20px;
            }

            .username {
                display: none;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <div class="navbar">

        <div class="logo">
            ⚽ Jersey Store
        </div>

        <div class="navbar-right">

            <span class="username">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout">
                    Logout
                </button>
            </form>

        </div>

    </div>


    {{-- CONTENT --}}
    <div class="container">

        <div class="welcome">

            <h1>
                Dashboard Admin
            </h1>

            <p>
                Selamat datang, {{ Auth::user()->name }} 👋
            </p>

        </div>


        {{-- MENU --}}
        <div class="menu">

            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('products.index') }}">
                ⚽ Kelola Produk
            </a>

            <a href="{{ route('articles.index') }}">
                📰 Kelola Artikel
            </a>

            <a href="{{ route('home') }}">
                🌐 Lihat Website
            </a>

        </div>


        {{-- STATISTICS --}}
        <div class="cards">

            {{-- PRODUK --}}
            <div class="card">

                <h3>
                    Total Produk Jersey
                </h3>

                <div class="number">
                    {{ \App\Models\Product::count() }}
                </div>

                <a href="{{ route('products.index') }}">
                    Kelola Produk →
                </a>

            </div>


            {{-- ARTIKEL --}}
            <div class="card">

                <h3>
                    Total Artikel
                </h3>

                <div class="number">
                    {{ \App\Models\Article::count() }}
                </div>

                <a href="{{ route('articles.index') }}">
                    Kelola Artikel →
                </a>

            </div>

        </div>

    </div>


    {{-- FOOTER --}}
    <footer>

        <p>
            © {{ date('Y') }} Jersey Store.
            Admin Dashboard.
        </p>

    </footer>

</body>
</html>