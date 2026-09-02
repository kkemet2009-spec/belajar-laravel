<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin') - Jersey Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Sidebar */
            --sb-bg: #10182B;
            --sb-bg-soft: #16213A;
            --sb-border: #212C45;
            --sb-text: #93A0BD;
            --sb-text-hover: #F1F4FB;
            --sb-active-bg: #1F5EFF;
            --sb-active-bg-soft: rgba(31, 94, 255, 0.14);

            /* Surface */
            --bg: #F6F7FB;
            --card: #FFFFFF;
            --border: #E7E9F1;
            --text-primary: #12162B;
            --text-secondary: #6B7280;
            --text-muted: #9AA1B2;

            /* Accents */
            --accent-blue: #1F5EFF;
            --accent-green: #16A34A;
            --accent-orange: #D97706;
            --accent-red: #DC2626;

            --radius: 12px;
            --shadow-sm: 0 1px 2px rgba(16, 24, 40, 0.04);
            --shadow-md: 0 4px 14px rgba(16, 24, 40, 0.06);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }

        svg { display: block; }

        /* =========================
           SIDEBAR
        ========================= */

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 264px;
            background: var(--sb-bg);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--sb-border);
        }

        .logo {
            height: 72px;
            display: flex;
            align-items: center;
            padding: 0 24px;
            gap: 12px;
            border-bottom: 1px solid var(--sb-border);
            flex-shrink: 0;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .logo span {
            font-size: 15.5px;
            font-weight: 700;
            letter-spacing: .2px;
            color: #FFFFFF;
        }

        .sidebar-scroll {
            flex: 1;
            overflow-y: auto;
            padding-top: 8px;
        }

        .menu-title {
            color: #5B6685;
            font-size: 11px;
            font-weight: 700;
            margin: 20px 24px 10px;
            text-transform: uppercase;
            letter-spacing: .6px;
        }

        .sidebar-menu {
            padding: 0 14px;
        }

        .sidebar-menu a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--sb-text);
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 9px;
            margin-bottom: 2px;
            transition: background .15s ease, color .15s ease;
            font-size: 13.8px;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: var(--sb-bg-soft);
            color: var(--sb-text-hover);
        }

        .sidebar-menu a.active {
            background: var(--sb-active-bg-soft);
            color: #FFFFFF;
            font-weight: 600;
        }

        .sidebar-menu a.active::before {
            content: "";
            position: absolute;
            left: -14px;
            top: 8px;
            bottom: 8px;
            width: 3px;
            border-radius: 0 3px 3px 0;
            background: var(--sb-active-bg);
        }

        .menu-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: .9;
        }

        .sidebar-menu a.active .menu-icon,
        .sidebar-menu a:hover .menu-icon {
            opacity: 1;
        }

        .menu-badge {
            margin-left: auto;
            background: var(--accent-red);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 1px 7px;
            border-radius: 999px;
            line-height: 16px;
        }

        .sidebar-divider {
            height: 1px;
            background: var(--sb-border);
            margin: 10px 24px;
        }

        /* USER BOX */

        .sidebar-footer {
            flex-shrink: 0;
            padding: 14px;
            border-top: 1px solid var(--sb-border);
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: var(--sb-bg-soft);
            border: 1px solid var(--sb-border);
            border-radius: 10px;
            margin-bottom: 8px;
        }

        .admin-user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: white;
        }

        .admin-user-text {
            display: flex;
            flex-direction: column;
            min-width: 0;
            line-height: 1.3;
        }

        .admin-user-text small {
            color: #6B7594;
            font-size: 11px;
        }

        .admin-user-text strong {
            color: white;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* LOGOUT */

        .logout button {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid rgba(220, 38, 38, .35);
            background: rgba(220, 38, 38, .12);
            color: #FCA5A5;
            padding: 10px;
            border-radius: 9px;
            font-size: 13.5px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background .15s ease, color .15s ease;
        }

        .logout button:hover {
            background: var(--accent-red);
            color: white;
            border-color: var(--accent-red);
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            margin-left: 264px;
            width: calc(100% - 264px);
            min-height: 100vh;
        }

        .topbar {
            height: 68px;
            background: var(--card);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .topbar-menu-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .topbar-menu-btn:hover {
            background: #F6F7FB;
        }

        .topbar h2 {
            font-size: 17px;
            font-weight: 700;
            letter-spacing: -.2px;
            color: var(--text-primary);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #F0FDF4;
            color: var(--accent-green);
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 600;
            border: 1px solid #DCFCE7;
        }

        .status-dot-sm {
            width: 6px;
            height: 6px;
            background: var(--accent-green);
            border-radius: 50%;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, .15);
        }

        .topbar-bell {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 9px;
            border: 1px solid var(--border);
            background: transparent;
            color: var(--text-secondary);
            text-decoration: none;
            transition: background .15s ease, color .15s ease;
        }

        .topbar-bell:hover {
            background: #F6F7FB;
            color: var(--text-primary);
        }

        .topbar-bell .dot {
            position: absolute;
            top: 7px;
            right: 8px;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--accent-red);
            border: 2px solid var(--card);
        }

        .content {
            padding: 32px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1024px) {

            .sidebar {
                width: 224px;
            }

            .main {
                margin-left: 224px;
                width: calc(100% - 224px);
            }

            .content {
                padding: 24px 20px;
            }
        }

        @media (max-width: 680px) {

            .sidebar {
                width: 72px;
            }

            .logo {
                padding: 0;
                justify-content: center;
            }

            .logo span {
                display: none;
            }

            .menu-title {
                display: none;
            }

            .sidebar-menu {
                padding: 0 10px;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 12px 6px;
            }

            .sidebar-menu a.active::before {
                left: -10px;
            }

            .sidebar-menu a span:not(.menu-icon) {
                display: none;
            }

            .menu-badge {
                position: absolute;
                top: 4px;
                right: 4px;
                margin-left: 0;
            }

            .admin-user-text {
                display: none;
            }

            .admin-user {
                justify-content: center;
            }

            .logout button span {
                display: none;
            }

            .main {
                margin-left: 72px;
                width: calc(100% - 72px);
            }

            .topbar {
                padding: 0 16px;
            }

            .topbar h2 {
                font-size: 15.5px;
            }

            .status span:not(.status-dot-sm) {
                display: none;
            }

            .content {
                padding: 18px 14px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

@php
    $unreadMessagesCount = \App\Models\ContactMessage::where('status', 'unread')->count();
@endphp

<div class="admin-layout">

    {{-- =========================
         SIDEBAR
    ========================== --}}

    <aside class="sidebar">

        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Jersey Store" class="logo-icon">
            <span>Jersey Store</span>
        </div>

        <div class="sidebar-scroll">

            <div class="menu-title">
                Menu Admin
            </div>

            <nav class="sidebar-menu">

                <a href="{{ url('/dashboard') }}"
                   class="{{ request()->is('dashboard') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9" rx="1.5"></rect><rect x="14" y="3" width="7" height="5" rx="1.5"></rect><rect x="14" y="12" width="7" height="9" rx="1.5"></rect><rect x="3" y="16" width="7" height="5" rx="1.5"></rect></svg>
                    </span>
                    <span>Dashboard</span>

                </a>

                <a href="{{ route('products.index') }}"
                   class="{{ request()->is('products*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.5 7.3 12 3 3.5 7.3 12 11.6l8.5-4.3Z"></path><path d="M3.5 7.3v9.4L12 21l8.5-4.3V7.3"></path><path d="M12 11.6V21"></path></svg>
                    </span>
                    <span>Kelola Produk</span>

                </a>

                <a href="{{ route('articles.index') }}"
                   class="{{ request()->is('articles*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"></path><path d="M14 3v5h5"></path><path d="M9 13h6"></path><path d="M9 17h6"></path></svg>
                    </span>
                    <span>Kelola Artikel</span>

                </a>

                <a href="{{ route('admin.messages.index') }}"
                   class="{{ request()->is('admin/messages*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"></path></svg>
                    </span>
                    <span>Pesan Masuk</span>

                    @if($unreadMessagesCount > 0)
                        <span class="menu-badge">{{ $unreadMessagesCount }}</span>
                    @endif

                </a>

                <a href="{{ route('admin.orders.index') }}"
                   class="{{ request()->is('admin/orders*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </span>
                    <span>Pesanan</span>

                </a>

                <div class="sidebar-divider"></div>

                <a href="{{ url('/produk') }}"
                   target="_blank">

                    <span class="menu-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><path d="M15 3h6v6"></path><path d="M10 14 21 3"></path></svg>
                    </span>
                    <span>Lihat Website</span>

                </a>

                <a href="{{ url('/artikel') }}"
                   target="_blank">

                    <span class="menu-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2Z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7Z"></path></svg>
                    </span>
                    <span>Artikel Publik</span>

                </a>

            </nav>

        </div>

        <div class="sidebar-footer">

            <div class="admin-user">
                <div class="admin-user-avatar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
                <div class="admin-user-text">
                    <small>Login sebagai</small>
                    <strong>Administrator</strong>
                </div>
            </div>

            <div class="logout">

                <form action="{{ url('/logout') }}" method="POST">

                    @csrf

                    <button type="submit">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="M16 17l5-5-5-5"></path><path d="M21 12H9"></path></svg>
                        <span>Logout</span>
                    </button>

                </form>

            </div>

        </div>

    </aside>


    {{-- =========================
         MAIN
    ========================== --}}

    <main class="main">

        <header class="topbar">

            <div class="topbar-left">
                <button type="button" class="topbar-menu-btn" aria-label="Menu">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16"></path><path d="M4 12h16"></path><path d="M4 18h16"></path></svg>
                </button>

                <h2>
                    @yield('page-title', 'Dashboard Admin')
                </h2>
            </div>

            <div class="topbar-right">

                <div class="status">
                    <span class="status-dot-sm"></span>
                    <span>Sistem Online</span>
                </div>

                <a href="{{ route('admin.messages.index') }}" class="topbar-bell" aria-label="Pesan Masuk">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path></svg>
                    @if($unreadMessagesCount > 0)
                        <span class="dot"></span>
                    @endif
                </a>

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