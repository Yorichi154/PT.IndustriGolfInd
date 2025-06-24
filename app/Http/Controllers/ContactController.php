<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
   public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone_number' => 'required|string|max:20',
        'subject' => 'required|string',
        'massege' => 'nullable|string',
    ]);

    // Simpan data (jika ada model ContactMessage, misalnya)
    // ContactMessage::create($validated);

    // Setelah berhasil simpan, redirect ke halaman thank you
return redirect()->route('contact.submit')->with('success', 'Pesan Anda telah dikirim.');
}

}