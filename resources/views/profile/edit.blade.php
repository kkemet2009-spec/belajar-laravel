@extends('layouts.app')

@section('content')

<style>
    .profile-wrap {
        max-width: 720px;
        margin: 0 auto;
        padding: 120px 20px 60px;
    }
    .profile-title {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 6px;
        color: #0f172a;
    }
    .profile-sub {
        color: #64748b;
        margin: 0 0 28px;
        font-size: 14px;
    }
    .profile-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
    }
    .profile-card h2 {
        font-size: 18px;
        margin: 0 0 4px;
        color: #0f172a;
    }
    .profile-card .hint {
        font-size: 13px;
        color: #64748b;
        margin: 0 0 18px;
    }
    .pf-group { margin-bottom: 16px; }
    .pf-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
        color: #334155;
    }
    .pf-input {
        width: 100%;
        box-sizing: border-box;
        padding: 11px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        font: inherit;
        font-size: 14px;
        background: #fff;
        color: #0f172a;
    }
    .pf-input:focus {
        outline: none;
        border-color: #f5b400;
        box-shadow: 0 0 0 3px rgba(245, 180, 0, .2);
    }
    textarea.pf-input { min-height: 90px; resize: vertical; }
    .pf-error { color: #dc2626; font-size: 12px; margin-top: 5px; }
    .pf-btn {
        display: inline-block;
        padding: 11px 22px;
        border: 0;
        border-radius: 999px;
        background: #0f172a;
        color: #fff;
        font: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }
    .pf-btn:hover { background: #1e293b; }
    .pf-btn-danger { background: #dc2626; }
    .pf-btn-danger:hover { background: #b91c1c; }
    .pf-alert {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 14px;
        margin-bottom: 20px;
    }
    .pf-links { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 24px; }
    .pf-links a {
        font-size: 14px;
        color: #0f172a;
        text-decoration: underline;
    }
    .pf-danger summary {
        cursor: pointer;
        font-weight: 600;
        color: #dc2626;
    }
</style>

<div class="profile-wrap">

    <h1 class="profile-title">Akun Saya</h1>
    <p class="profile-sub">Kelola informasi profil dan keamanan akun Anda.</p>

    @if (session('status') === 'profile-updated')
        <div class="pf-alert">Profil berhasil diperbarui.</div>
    @endif

    @if (session('status') === 'password-updated')
        <div class="pf-alert">Password berhasil diubah.</div>
    @endif

    <div class="pf-links">
        @if(! $user->isAdmin() && Route::has('orders.index'))
            <a href="{{ route('orders.index') }}">Pesanan Saya</a>
        @endif
        @if($user->isAdmin())
            <a href="{{ route('dashboard') }}">Kembali ke Dashboard Admin</a>
        @endif
    </div>

    {{-- ================= INFORMASI PROFIL ================= --}}
    <div class="profile-card">
        <h2>Informasi Profil</h2>
        <p class="hint">Perbarui nama, email, nomor telepon, dan alamat Anda.</p>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="pf-group">
                <label for="name">Nama</label>
                <input id="name" name="name" type="text" class="pf-input"
                       value="{{ old('name', $user->name) }}" required autocomplete="name">
                @error('name') <div class="pf-error">{{ $message }}</div> @enderror
            </div>

            <div class="pf-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="pf-input"
                       value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email') <div class="pf-error">{{ $message }}</div> @enderror
            </div>

            <div class="pf-group">
                <label for="phone">Nomor Telepon</label>
                <input id="phone" name="phone" type="text" class="pf-input"
                       value="{{ old('phone', $user->phone) }}" autocomplete="tel">
                @error('phone') <div class="pf-error">{{ $message }}</div> @enderror
            </div>

            <div class="pf-group">
                <label for="address">Alamat</label>
                <textarea id="address" name="address" class="pf-input">{{ old('address', $user->address) }}</textarea>
                @error('address') <div class="pf-error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="pf-btn">Simpan Perubahan</button>
        </form>
    </div>

    {{-- ================= UBAH PASSWORD ================= --}}
    <div class="profile-card">
        <h2>Ubah Password</h2>
        <p class="hint">Gunakan password yang panjang dan sulit ditebak.</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <div class="pf-group">
                <label for="current_password">Password Saat Ini</label>
                <input id="current_password" name="current_password" type="password"
                       class="pf-input" autocomplete="current-password">
                @if($errors->updatePassword->has('current_password'))
                    <div class="pf-error">{{ $errors->updatePassword->first('current_password') }}</div>
                @endif
            </div>

            <div class="pf-group">
                <label for="new_password">Password Baru</label>
                <input id="new_password" name="password" type="password"
                       class="pf-input" autocomplete="new-password">
                @if($errors->updatePassword->has('password'))
                    <div class="pf-error">{{ $errors->updatePassword->first('password') }}</div>
                @endif
            </div>

            <div class="pf-group">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       class="pf-input" autocomplete="new-password">
            </div>

            <button type="submit" class="pf-btn">Ubah Password</button>
        </form>
    </div>

    {{-- ================= HAPUS AKUN (CUSTOMER SAJA) ================= --}}
    @unless($user->isAdmin())
        <div class="profile-card pf-danger">
            <details {{ $errors->userDeletion->isNotEmpty() ? 'open' : '' }}>
                <summary>Hapus Akun</summary>

                <p class="hint" style="margin-top:14px;">
                    Setelah dihapus, akun Anda tidak dapat dipulihkan. Masukkan password untuk konfirmasi.
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="pf-group">
                        <label for="delete_password">Password</label>
                        <input id="delete_password" name="password" type="password" class="pf-input">
                        @if($errors->userDeletion->has('password'))
                            <div class="pf-error">{{ $errors->userDeletion->first('password') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="pf-btn pf-btn-danger"
                            onclick="return confirm('Yakin ingin menghapus akun Anda secara permanen?');">
                        Hapus Akun Saya
                    </button>
                </form>
            </details>
        </div>
    @endunless

</div>

@endsection