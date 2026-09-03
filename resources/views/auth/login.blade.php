@extends('layouts.app')

@section('title', 'Login Admin - Jersey Store')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    html, body {
        height: 100%;
        overflow: hidden;
    }

    * {
        box-sizing: border-box;
    }

    .login-page {
        height: 100vh;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1.05fr 1fr;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
    }

    /* ================= LEFT: STADIUM PANEL ================= */

    .login-visual {
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at 20% 15%, rgba(59,130,246,.25), transparent 45%),
            radial-gradient(circle at 80% 85%, rgba(37,99,235,.18), transparent 50%),
            linear-gradient(180deg, #06152F 0%, #0B2447 55%, #0F3460 100%);
        color: #FFFFFF;
        padding: 28px 40px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 12px;
    }

    /* Stadium light beams — pure CSS */
    .stadium-light {
        position: absolute;
        top: -60px;
        width: 3px;
        height: 340px;
        background: linear-gradient(180deg, rgba(255,255,255,.55), transparent);
        filter: blur(1px);
        opacity: .5;
        animation: glow 4s ease-in-out infinite alternate;
    }

    .stadium-light.l1 { left: 8%; transform: rotate(18deg); animation-delay: 0s; }
    .stadium-light.l2 { left: 20%; transform: rotate(10deg); animation-delay: .6s; }
    .stadium-light.l3 { right: 22%; transform: rotate(-10deg); animation-delay: 1.2s; }
    .stadium-light.l4 { right: 8%; transform: rotate(-18deg); animation-delay: 1.8s; }

    @keyframes glow {
        from { opacity: .25; }
        to { opacity: .6; }
    }

    /* Floating particles */
    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: rgba(255,255,255,.5);
        animation: floatUp 6s linear infinite;
    }

    @keyframes floatUp {
        from { transform: translateY(0); opacity: 0; }
        10% { opacity: .8; }
        90% { opacity: .3; }
        to { transform: translateY(-140px); opacity: 0; }
    }

    /* Pitch strip at the bottom */
    .pitch-strip {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 120px;
        background: linear-gradient(180deg, transparent, rgba(6,78,59,.55));
    }

    .login-visual > * {
        position: relative;
        z-index: 2;
    }

    .visual-brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .visual-brand img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }

    .visual-brand-text .name {
        font-size: 17px;
        font-weight: 800;
        letter-spacing: .5px;
    }

    .visual-brand-text .subname {
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 1.2px;
        color: #93C5FD;
        margin-top: 1px;
    }

    /* Jersey illustration slot — replace with a real photo/illustration
       later if you have one. This is a simple CSS/SVG placeholder,
       intentionally without any third-party brand logo. */
    .visual-illustration {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .visual-illustration img {
        width: 100%;
        max-width: 320px;
        max-height: 260px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
        border-radius: 16px;
    }

    .jersey-badge {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.12);
        display: flex;
        align-items: center;
        justify-content: center;
        animation: floatSoft 4.5s ease-in-out infinite;
    }

    @keyframes floatSoft {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .visual-heading h1 {
        font-size: 25px;
        font-weight: 800;
        letter-spacing: -.5px;
        margin: 0 0 4px;
        color: #FFFFFF;
        line-height: 1.25;
    }

    .visual-heading .highlight {
        color: #60A5FA;
    }

    .visual-heading p.desc {
        color: rgba(255,255,255,.72);
        font-size: 12.5px;
        line-height: 1.6;
        max-width: 380px;
        margin: 8px 0 0;
    }

    .visual-features {
        display: flex;
        gap: 10px;
        margin-top: 16px;
    }

    .feature-box {
        flex: 1;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 12px;
        padding: 10px 8px;
        text-align: center;
    }

    .feature-icon {
        width: 26px;
        height: 26px;
        margin: 0 auto 6px;
        border-radius: 8px;
        background: rgba(59,130,246,.18);
        color: #60A5FA;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .feature-box h4 {
        font-size: 11.5px;
        font-weight: 700;
        color: #FFFFFF;
        margin: 0 0 2px;
    }

    .feature-box p {
        font-size: 9.5px;
        color: rgba(255,255,255,.6);
        line-height: 1.35;
        margin: 0;
    }

    .visual-trust {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: rgba(255,255,255,.5);
    }

    /* ================= RIGHT: LOGIN CARD ================= */

    .login-side {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F8FAFC;
        padding: 24px 24px;
    }

    .login-card {
        width: 100%;
        max-width: 380px;
        background: #FFFFFF;
        border-radius: 22px;
        box-shadow: 0 20px 60px -15px rgba(15,23,42,.15);
        padding: 30px 32px;
        opacity: 0;
        transform: translateY(14px);
        animation: cardIn .55s ease forwards;
    }

    @keyframes cardIn {
        to { opacity: 1; transform: translateY(0); }
    }

    .login-badge {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin: 0 auto 14px;
        background: linear-gradient(160deg, #2563EB, #1D4ED8);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFFFFF;
        font-weight: 800;
        box-shadow: 0 10px 24px -6px rgba(37,99,235,.45);
    }

    .login-card h1 {
        text-align: center;
        font-size: 21px;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }

    .login-card .subtitle {
        text-align: center;
        font-size: 12.5px;
        color: #64748B;
        line-height: 1.6;
        margin: 0 0 20px;
    }

    /* Alerts */
    .login-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 10px;
        font-size: 13px;
        line-height: 1.5;
        margin-bottom: 18px;
    }

    .login-alert--error {
        background: #FEF2F2;
        color: #B91C1C;
        border: 1px solid #FECACA;
    }

    .login-alert--success {
        background: #F0FDF4;
        color: #15803D;
        border: 1px solid #BBF7D0;
    }

    .login-form {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .login-field label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 7px;
    }

    .login-input {
        position: relative;
        display: flex;
        align-items: center;
        border: 1.5px solid #E2E8F0;
        border-radius: 10px;
        background: #F8FAFC;
        transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
    }

    .login-input:focus-within {
        border-color: #2563EB;
        background: #FFFFFF;
        box-shadow: 0 0 0 4px rgba(37,99,235,.1);
    }

    .login-input--error {
        border-color: #EF4444;
        background: #FEF2F2;
    }

    .login-input .icon {
        position: absolute;
        left: 13px;
        color: #94A3B8;
        display: flex;
        pointer-events: none;
    }

    .login-input input {
        width: 100%;
        border: none;
        background: transparent;
        outline: none;
        padding: 12px 14px 12px 40px;
        font-size: 14px;
        font-family: inherit;
        color: #111827;
    }

    .login-input input::placeholder {
        color: #94A3B8;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        background: none;
        border: none;
        color: #94A3B8;
        padding: 6px;
        display: flex;
        cursor: pointer;
        border-radius: 6px;
    }

    .toggle-password:hover {
        color: #475569;
        background: #F1F5F9;
    }

    .field-error {
        font-size: 12px;
        color: #DC2626;
        margin-top: 6px;
        display: block;
    }

    .login-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .login-checkbox {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        user-select: none;
    }

    .login-checkbox input {
        width: 16px;
        height: 16px;
        accent-color: #2563EB;
        cursor: pointer;
    }

    .login-checkbox span {
        font-size: 13px;
        color: #64748B;
    }

    .login-forgot {
        font-size: 13px;
        font-weight: 700;
        color: #2563EB;
        text-decoration: none;
    }

    .login-forgot:hover {
        text-decoration: underline;
    }

    .login-submit {
        width: 100%;
        border: none;
        border-radius: 10px;
        padding: 14px;
        background: linear-gradient(135deg, #2563EB, #3B82F6);
        color: #FFFFFF;
        font-size: 14.5px;
        font-weight: 700;
        cursor: pointer;
        font-family: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease;
    }

    .login-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 26px -8px rgba(37,99,235,.5);
    }

    .login-submit:active {
        transform: translateY(0);
    }

    .login-submit.is-loading {
        opacity: .8;
        pointer-events: none;
    }

    .login-submit__loading {
        display: none;
        align-items: center;
        gap: 8px;
    }

    .login-submit.is-loading .login-submit__label { display: none; }
    .login-submit.is-loading .login-submit__loading { display: inline-flex; }

    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 22px 0 18px;
        color: #94A3B8;
        font-size: 12.5px;
    }

    .divider::before,
    .divider::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #E5E7EB;
    }

    .back-website {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 13px;
        border-radius: 10px;
        border: 1.5px solid #DBEAFE;
        background: #FFFFFF;
        color: #2563EB;
        font-weight: 700;
        font-size: 13.5px;
        text-decoration: none;
        transition: background .2s ease, transform .2s ease;
    }

    .back-website:hover {
        background: #EFF6FF;
        transform: translateY(-1px);
    }

    .login-register {
        margin-top: 20px;
        text-align: center;
        font-size: 13px;
        color: #64748B;
    }

    .login-register a {
        color: #2563EB;
        font-weight: 700;
        text-decoration: none;
    }

    .login-register a:hover {
        text-decoration: underline;
    }

    .login-footer-note {
        margin-top: 22px;
        text-align: center;
        font-size: 12px;
        color: #94A3B8;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 980px) {

        .login-page {
            grid-template-columns: 1fr;
        }

        .login-visual {
            padding: 32px 28px;
            min-height: 300px;
        }

        .visual-illustration,
        .visual-features {
            display: none;
        }

        .visual-heading h1 {
            font-size: 26px;
        }
    }

    @media (max-width: 480px) {

        .login-side {
            padding: 24px 16px;
        }

        .login-card {
            padding: 30px 22px;
            border-radius: 18px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .login-page * {
            animation: none !important;
            transition: none !important;
        }
    }
</style>

<div class="login-page">

    <!-- ================= LEFT: STADIUM VISUAL ================= -->

    <div class="login-visual">

        <div class="stadium-light l1"></div>
        <div class="stadium-light l2"></div>
        <div class="stadium-light l3"></div>
        <div class="stadium-light l4"></div>

        <div class="particle" style="left:15%; animation-delay:0s;"></div>
        <div class="particle" style="left:35%; animation-delay:1.5s;"></div>
        <div class="particle" style="left:55%; animation-delay:3s;"></div>
        <div class="particle" style="left:75%; animation-delay:.8s;"></div>
        <div class="particle" style="left:90%; animation-delay:2.2s;"></div>

        <div class="pitch-strip"></div>

        <div class="visual-brand">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ asset('images/logo.png') }}" alt="Jersey Store">
            @endif
            <div class="visual-brand-text">
                <div class="name">JERSEY STORE</div>
                <div class="subname">ADMIN DASHBOARD</div>
            </div>
        </div>

        {{--
            Slot ilustrasi. Otomatis pakai gambar asli begitu kamu
            upload file ke: public/images/login-illustration.png
            (format PNG, disarankan ada background transparan).
            Kalau file belum ada, otomatis fallback ke ikon CSS.
        --}}
        <div class="visual-illustration">
            @if(file_exists(public_path('images/login-illustration.png')))
                <img src="{{ asset('images/login-illustration.png') }}" alt="Jersey Store">
            @else
                <div class="jersey-badge">
                    <svg width="90" height="90" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 3l4 2 4-2 3 4-2 2v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V9L3 7l3-4z"/>
                        <circle cx="17" cy="17" r="3.4" fill="#0B2447" stroke="#93C5FD"/>
                    </svg>
                </div>
            @endif
        </div>

        <div>
            <div class="visual-heading">
                <h1>Welcome Back!<br><span class="highlight">Sign in to continue</span></h1>
                <p class="desc">Manage your products, orders, and grow your jersey business.</p>
            </div>

            <div class="visual-features">

                <div class="feature-box">
                    <div class="feature-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l8 3v6c0 5-3.5 8.5-8 11-4.5-2.5-8-6-8-11V5l8-3z"/></svg>
                    </div>
                    <h4>Secure</h4>
                    <p>Your data is safe with us</p>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 11 14 11 22 21 10 13 10 13 2"/></svg>
                    </div>
                    <h4>Fast</h4>
                    <p>Quick access to your dashboard</p>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    </div>
                    <h4>Analytics</h4>
                    <p>Track your store performance</p>
                </div>

            </div>
        </div>

        <div class="visual-trust">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l8 3v6c0 5-3.5 8.5-8 11-4.5-2.5-8-6-8-11V5l8-3z"/></svg>
            Trusted by jersey store owners nationwide.
        </div>

    </div>


    <!-- ================= RIGHT: LOGIN CARD ================= -->

    <div class="login-side">

        <div class="login-card">

            {{--
                Badge di atas card. Otomatis pakai logo asli begitu
                kamu upload file ke: public/images/logo.png
                Kalau file belum ada, otomatis fallback ke ikon jersey.
            --}}
            <div class="login-badge">
                @if(file_exists(public_path('images/logo.png')))
                    <img src="{{ asset('images/logo.png') }}" alt="Jersey Store" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
                @else
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M8 3l4 2 4-2 3 4-2 2v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V9L3 7l3-4z"/></svg>
                @endif
            </div>

            <h1>Login</h1>
            <p class="subtitle">Sign in to continue to Jersey Store<br>admin dashboard</p>

            {{-- Session status (contoh: setelah reset password) --}}
            @if (session('status'))
                <div class="login-alert login-alert--success" role="alert">
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            {{-- Error umum (misal: kredensial salah) --}}
            @error('email')
                <div class="login-alert login-alert--error" role="alert">
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <form method="POST" action="{{ route('login') }}" class="login-form" novalidate>
                @csrf

                {{-- Email --}}
                <div class="login-field">
                    <label for="email">Email Address</label>
                    <div class="login-input @error('email') login-input--error @enderror">
                        <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 6 10-6"/></svg>
                        </span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            autocomplete="username"
                            autofocus
                            required
                        >
                    </div>
                </div>

                {{-- Password --}}
                <div class="login-field">
                    <label for="password">Password</label>
                    <div class="login-input @error('password') login-input--error @enderror">
                        <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="9" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >
                        <button type="button" class="toggle-password" id="togglePassword" aria-label="Tampilkan password">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" id="eyeIcon"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember me + Forgot password --}}
                <div class="login-row">
                    <label class="login-checkbox">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="login-forgot">Forgot password?</a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="login-submit" id="submitBtn">
                    <span class="login-submit__label">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                        Login
                    </span>
                    <span class="login-submit__loading">
                        Memproses...
                    </span>
                </button>
            </form>

            <div class="divider">or</div>

            <a href="{{ route('home') }}" class="back-website">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l8 3v6c0 5-3.5 8.5-8 11-4.5-2.5-8-6-8-11V5l8-3z"/></svg>
                Back to Website
            </a>

            @if (Route::has('register'))
                <p class="login-register">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            @endif

            <p class="login-footer-note">&copy; {{ date('Y') }} Jersey Store. All rights reserved.</p>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        var toggleBtn = document.getElementById('togglePassword');
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.getElementById('eyeIcon');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function () {
                var isHidden = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isHidden ? 'text' : 'password');

                eyeIcon.innerHTML = isHidden
                    ? '<path d="M17.94 17.94A10.94 10.94 0 0 1 12 19c-7 0-11-7-11-7a18.6 18.6 0 0 1 4.22-5.06M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 7 11 7a18.6 18.6 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>'
                    : '<path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/>';
            });
        }

        var form = document.querySelector('.login-form');
        var submitBtn = document.getElementById('submitBtn');

        if (form && submitBtn) {
            form.addEventListener('submit', function () {
                submitBtn.classList.add('is-loading');
                submitBtn.disabled = true;
            });
        }
    });
</script>

@endsection