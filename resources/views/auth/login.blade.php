@extends('layouts.app')

@section('title', 'Login Admin - Jersey Store')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    .login-screen {
        --js-charcoal:      #12141A;
        --js-charcoal-soft: #1B1E26;
        --js-accent:        #16C784;
        --js-accent-dark:   #0FA968;
        --js-accent-soft:   rgba(22, 199, 132, 0.12);
        --js-gray-300:      #2A2E38;
        --js-gray-500:      #7C8394;
        --js-white:         #FFFFFF;
        --js-error:         #F2555A;
        --js-error-soft:    rgba(242, 85, 90, 0.10);
        --js-success:       #16C784;
        --js-success-soft:  rgba(22, 199, 132, 0.10);
        --js-transition: 220ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .login-screen {
        min-height: 640px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 64px 20px;
        position: relative;
        isolation: isolate;
        overflow: hidden;
        font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        background:
            radial-gradient(circle at 15% 10%, rgba(22,199,132,0.10), transparent 40%),
            radial-gradient(circle at 85% 90%, rgba(22,199,132,0.06), transparent 45%),
            linear-gradient(180deg, #0C0D11 0%, #12141A 100%);
    }

    /* Faint pitch center-circle, subtle sporting motif, kept quiet */
    .login-screen::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 780px;
        height: 780px;
        border: 1px solid rgba(255, 255, 255, 0.035);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        z-index: 0;
        pointer-events: none;
    }

    .login-screen::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 1180px;
        height: 1180px;
        border: 1px solid rgba(255, 255, 255, 0.02);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        z-index: 0;
        pointer-events: none;
    }

    .login-card {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 408px;
        background: var(--js-charcoal-soft);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 20px;
        padding: 40px 36px;
        box-shadow: 0 30px 80px -20px rgba(0, 0, 0, 0.55);
        box-sizing: border-box;
    }

    /* Signature: thin jersey-stripe accent bar on top of the card */
    .login-card__stripe {
        position: absolute;
        top: 0;
        left: 28px;
        right: 28px;
        height: 3px;
        border-radius: 0 0 4px 4px;
        background: linear-gradient(90deg, var(--js-accent) 0%, transparent 50%, var(--js-accent) 100%);
        opacity: 0.85;
    }

    .login-brand {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 28px;
    }

    .login-brand__logo {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: var(--js-accent-soft);
        color: var(--js-accent);
        font-size: 1.35rem;
        margin-bottom: 16px;
    }

    .login-brand__name {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.15rem;
        letter-spacing: 0.02em;
        color: var(--js-white);
    }

    .login-brand__name strong {
        color: var(--js-accent);
    }

    .login-brand__title {
        margin-top: 18px;
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--js-white);
    }

    .login-brand__subtitle {
        margin-top: 6px;
        font-size: 0.88rem;
        color: var(--js-gray-500);
        line-height: 1.5;
    }

    /* Alerts */
    .login-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 10px;
        font-size: 0.85rem;
        line-height: 1.45;
        margin-bottom: 20px;
    }

    .login-alert i { margin-top: 2px; }

    .login-alert--error {
        background: var(--js-error-soft);
        color: var(--js-error);
        border: 1px solid rgba(242, 85, 90, 0.22);
    }

    .login-alert--success {
        background: var(--js-success-soft);
        color: var(--js-accent);
        border: 1px solid rgba(22, 199, 132, 0.22);
    }

    /* Form */
    .login-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .login-field {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .login-field label {
        font-size: 0.82rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.85);
    }

    .login-input {
        position: relative;
        display: flex;
        align-items: center;
        border: 1.5px solid var(--js-gray-300);
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.03);
        transition: border-color var(--js-transition), box-shadow var(--js-transition), background var(--js-transition);
    }

    .login-input:focus-within {
        border-color: var(--js-accent);
        background: rgba(22, 199, 132, 0.04);
        box-shadow: 0 0 0 4px var(--js-accent-soft);
    }

    .login-input--error {
        border-color: var(--js-error);
        background: var(--js-error-soft);
    }

    .login-input--error:focus-within {
        box-shadow: 0 0 0 4px rgba(242, 85, 90, 0.12);
    }

    .login-input i.login-input__icon {
        position: absolute;
        left: 14px;
        color: var(--js-gray-500);
        font-size: 0.88rem;
        pointer-events: none;
    }

    .login-input input {
        width: 100%;
        border: none;
        background: transparent;
        outline: none;
        padding: 12px 14px 12px 40px;
        font-size: 0.92rem;
        font-family: inherit;
        color: var(--js-white);
        box-sizing: border-box;
    }

    .login-input input::placeholder {
        color: #565C6B;
    }

    .login-toggle-password {
        position: absolute;
        right: 10px;
        background: none;
        border: none;
        color: var(--js-gray-500);
        font-size: 0.88rem;
        padding: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: color var(--js-transition), background var(--js-transition);
    }

    .login-toggle-password:hover {
        color: var(--js-white);
        background: rgba(255, 255, 255, 0.06);
    }

    .login-toggle-password:focus-visible,
    .login-input input:focus-visible {
        outline: 2px solid var(--js-accent);
        outline-offset: 2px;
    }

    .login-field-error {
        font-size: 0.78rem;
        color: var(--js-error);
    }

    /* Row: remember + forgot */
    .login-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: -2px;
    }

    .login-checkbox {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        user-select: none;
    }

    .login-checkbox input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .login-checkbox__box {
        width: 17px;
        height: 17px;
        border: 1.5px solid var(--js-gray-300);
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background var(--js-transition), border-color var(--js-transition);
        flex-shrink: 0;
    }

    .login-checkbox__box::after {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        font-size: 0.56rem;
        color: var(--js-charcoal);
        opacity: 0;
        transition: opacity var(--js-transition);
    }

    .login-checkbox input:checked + .login-checkbox__box {
        background: var(--js-accent);
        border-color: var(--js-accent);
    }

    .login-checkbox input:checked + .login-checkbox__box::after {
        opacity: 1;
    }

    .login-checkbox input:focus-visible + .login-checkbox__box {
        outline: 2px solid var(--js-accent);
        outline-offset: 2px;
    }

    .login-checkbox span.login-checkbox__label {
        font-size: 0.83rem;
        color: var(--js-gray-500);
    }

    .login-forgot {
        font-size: 0.83rem;
        font-weight: 600;
        color: var(--js-accent);
        transition: opacity var(--js-transition);
    }

    .login-forgot:hover {
        opacity: 0.75;
        text-decoration: underline;
    }

    /* Submit button — overrides the site's generic .btn look on purpose */
    .login-submit {
        position: relative;
        width: 100%;
        padding: 13px 20px;
        border: none;
        border-radius: 10px;
        background: var(--js-accent);
        color: #06251B;
        font-size: 0.94rem;
        font-weight: 700;
        letter-spacing: 0.01em;
        margin-top: 2px;
        transition: background var(--js-transition), transform var(--js-transition), box-shadow var(--js-transition);
        cursor: pointer;
    }

    .login-submit:hover {
        background: var(--js-accent-dark);
        box-shadow: 0 8px 24px -6px rgba(22, 199, 132, 0.45);
    }

    .login-submit:active {
        transform: scale(0.98);
    }

    .login-submit:focus-visible {
        outline: 2px solid var(--js-white);
        outline-offset: 3px;
    }

    .login-submit__label,
    .login-submit__loading {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .login-submit__loading { display: none; }

    .login-submit.is-loading .login-submit__label { display: none; }
    .login-submit.is-loading .login-submit__loading { display: inline-flex; }
    .login-submit.is-loading {
        opacity: 0.85;
        pointer-events: none;
    }

    /* Register link */
    .login-register {
        margin-top: 24px;
        text-align: center;
        font-size: 0.85rem;
        color: var(--js-gray-500);
    }

    .login-register a {
        color: var(--js-accent);
        font-weight: 600;
        transition: opacity var(--js-transition);
    }

    .login-register a:hover {
        opacity: 0.75;
        text-decoration: underline;
    }

    .login-footer-note {
        margin-top: 22px;
        text-align: center;
        font-size: 0.76rem;
        color: #4A505E;
    }

    /* Responsive */
    @media (max-width: 700px) {
        .login-screen {
            padding: 40px 16px;
        }

        .login-card {
            padding: 32px 22px;
            border-radius: 16px;
        }

        .login-brand__title {
            font-size: 1.32rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .login-screen * {
            transition: none !important;
            animation: none !important;
        }
    }
</style>

<div class="login-screen">
    <div class="login-card">
        <div class="login-card__stripe" aria-hidden="true"></div>

        <div class="login-brand">
            <span class="login-brand__logo">
                <i class="fa-solid fa-shirt"></i>
            </span>
            <span class="login-brand__name">JERSEY<strong>STORE</strong></span>

            <h1 class="login-brand__title">Login Admin</h1>
            <p class="login-brand__subtitle">Masuk ke dashboard untuk mengelola Jersey Store.</p>
        </div>

        {{-- Session status (contoh: setelah reset password) --}}
        @if (session('status'))
            <div class="login-alert login-alert--success" role="alert">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        {{-- Error umum (misal: kredensial salah) --}}
        @error('email')
            @if ($message === __('auth.failed') || $loop->first)
                <div class="login-alert login-alert--error" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>{{ $message }}</span>
                </div>
            @endif
        @enderror

        <form method="POST" action="{{ route('login') }}" class="login-form" novalidate>
            @csrf

            {{-- Email --}}
            <div class="login-field">
                <label for="email">Email</label>
                <div class="login-input @error('email') login-input--error @enderror">
                    <i class="fa-solid fa-envelope login-input__icon"></i>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@jerseystore.com"
                        autocomplete="username"
                        autofocus
                        required
                        aria-describedby="email-error"
                    >
                </div>
                @error('email')
                    <span id="email-error" class="login-field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="login-field">
                <label for="password">Password</label>
                <div class="login-input @error('password') login-input--error @enderror">
                    <i class="fa-solid fa-lock login-input__icon"></i>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                        aria-describedby="password-error"
                    >
                    <button
                        type="button"
                        class="login-toggle-password"
                        id="togglePassword"
                        aria-label="Tampilkan password"
                        aria-pressed="false"
                    >
                        <i class="fa-solid fa-eye" id="togglePasswordIcon"></i>
                    </button>
                </div>
                @error('password')
                    <span id="password-error" class="login-field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Remember me + Forgot password --}}
            <div class="login-row">
                <label class="login-checkbox">
                    <input type="checkbox" name="remember" id="remember">
                    <span class="login-checkbox__box"></span>
                    <span class="login-checkbox__label">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="login-forgot">Lupa password?</a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="login-submit" id="submitBtn">
                <span class="login-submit__label">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login
                </span>
                <span class="login-submit__loading">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                    Memproses...
                </span>
            </button>
        </form>

        @if (Route::has('register'))
            <p class="login-register">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </p>
        @endif

        <p class="login-footer-note">
            &copy; {{ date('Y') }} Jersey Store. Panel khusus administrator.
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Show / hide password
        var toggleBtn = document.getElementById('togglePassword');
        var toggleIcon = document.getElementById('togglePasswordIcon');
        var passwordInput = document.getElementById('password');

        if (toggleBtn && passwordInput && toggleIcon) {
            toggleBtn.addEventListener('click', function () {
                var isHidden = passwordInput.getAttribute('type') === 'password';

                passwordInput.setAttribute('type', isHidden ? 'text' : 'password');

                toggleIcon.classList.toggle('fa-eye', !isHidden);
                toggleIcon.classList.toggle('fa-eye-slash', isHidden);

                toggleBtn.setAttribute('aria-pressed', String(isHidden));
                toggleBtn.setAttribute(
                    'aria-label',
                    isHidden ? 'Sembunyikan password' : 'Tampilkan password'
                );
            });
        }

        // Submit loading state
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