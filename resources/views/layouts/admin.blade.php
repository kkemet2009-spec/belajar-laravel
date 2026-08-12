<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin') - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 260px;
            background: #111111;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .logo {
            height: 90px;
            display: flex;
            align-items: center;
            padding: 0 28px;
            font-size: 21px;
            font-weight: bold;
            border-bottom: 1px solid #292929;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 20px;
        }

        .menu-title {
            color: #999;
            font-size: 12px;
            margin: 25px 28px 10px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .sidebar-menu {
            padding: 0 18px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #ddd;
            text-decoration: none;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 6px;
            transition: .2s;
            font-size: 15px;
        }

        .sidebar-menu a:hover {
            background: #1f1f1f;
            color: white;
        }

        .sidebar-menu a.active {
            background: #2563eb;
            color: white;
            font-weight: bold;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 18px;
        }

        /* USER BOX */

        .admin-user {
            margin: auto 18px 12px;
            padding: 15px;
            background: #1d1d1d;
            border: 1px solid #303030;
            border-radius: 12px;
        }

        .admin-user small {
            color: #999;
            display: block;
            margin-bottom: 5px;
        }

        .admin-user strong {
            color: white;
        }

        /* LOGOUT */

        .logout {
            margin: 0 18px 20px;
        }

        .logout button {
            width: 100%;
            border: none;
            background: #dc2626;
            color: white;
            padding: 13px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout button:hover {
            background: #b91c1c;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
        }

        .topbar {
            height: 76px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 34px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar h2 {
            font-size: 21px;
        }

        .status {
            background: #ecfdf5;
            color: #059669;
            padding: 9px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .content {
            padding: 38px 34px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
                width: calc(100% - 220px);
            }

            .content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 600px) {

            .sidebar {
                width: 75px;
            }

            .logo {
                padding: 0;
                justify-content: center;
            }

            .logo span {
                display: none;
            }

            .logo-icon {
                margin: 0;
            }

            .menu-title {
                display: none;
            }

            .sidebar-menu {
                padding: 0 10px;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 14px 5px;
            }

            .sidebar-menu a span:not(.menu-icon) {
                display: none;
            }

            .admin-user {
                display: none;
            }

            .logout {
                margin: 0 10px 15px;
            }

            .logout button {
                font-size: 0;
            }

            .logout button::after {
                content: "↪";
                font-size: 20px;
            }

            .main {
                margin-left: 75px;
                width: calc(100% - 75px);
            }

            .topbar {
                padding: 0 18px;
            }

            .topbar h2 {
                font-size: 18px;
            }

            .content {
                padding: 20px 15px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="admin-layout">

    {{-- =========================
         SIDEBAR
    ========================== --}}

    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">⚽</div>
            <span>Jersey Store</span>
        </div>

        <div class="menu-title">
            Menu Admin
        </div>

        <nav class="sidebar-menu">

            <a href="{{ url('/dashboard') }}"
               class="{{ request()->is('dashboard') ? 'active' : '' }}">

                <span class="menu-icon">📊</span>
                <span>Dashboard</span>

            </a>

            <a href="{{ route('products.index') }}"
               class="{{ request()->is('products*') ? 'active' : '' }}">

                <span class="menu-icon">⚽</span>
                <span>Kelola Produk</span>

            </a>

            <a href="{{ route('articles.index') }}"
               class="{{ request()->is('articles*') ? 'active' : '' }}">

                <span class="menu-icon">📰</span>
                <span>Kelola Artikel</span>

            </a>

            <a href="{{ url('/produk') }}"
               target="_blank">

                <span class="menu-icon">🌐</span>
                <span>Lihat Website</span>

            </a>

            <a href="{{ url('/artikel') }}"
               target="_blank">

                <span class="menu-icon">📚</span>
                <span>Artikel Publik</span>

            </a>

        </nav>

        <div class="admin-user">

            <small>Login sebagai</small>

            <strong>Administrator</strong>

        </div>

        <div class="logout">

            <form action="{{ url('/logout') }}" method="POST">

                @csrf

                <button type="submit">
                    🚪 Logout
                </button>

            </form>

        </div>

    </aside>


    {{-- =========================
         MAIN
    ========================== --}}

    <main class="main">

        <header class="topbar">

            <h2>
                @yield('page-title', 'Dashboard Admin')
            </h2>

            <div class="status">
                ● Sistem Online
            </div>

        </header>

        <section class="content">

            @yield('content')

        </section>

    </main>

</div>

@stack('scripts')

</body>
</html>