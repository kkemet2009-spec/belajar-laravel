<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Proses form "Hubungi Kami" di halaman Kontak.
     *
     * Sebelumnya pesan hanya dicatat ke log Laravel. Sekarang pesan
     * benar-benar disimpan ke tabel `contact_messages` supaya bisa
     * dilihat Admin di Dashboard / halaman "Pesan Masuk".
     */
    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        ContactMessage::create($validated + [
            'status' => 'unread',
        ]);

        return back()
            ->with('success', 'Pesan kamu berhasil dikirim. Tim Jersey Store akan segera menghubungi kamu.')
            ->withInput();
    }
}