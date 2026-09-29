<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     * Admin -> dashboard admin. Customer -> Home (website publik).
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->isAdmin()) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('home');
    }

    /**
     * Logout pengguna.
     * Admin -> halaman login (perilaku lama dipertahankan).
     * Customer -> Home.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $wasAdmin = $request->user()?->isAdmin() ?? false;

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $wasAdmin
            ? redirect()->route('login')
            : redirect()->route('home');
    }
}