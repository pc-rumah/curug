<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class kirimEmailController extends Controller
{
    public function kirim(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('curugsemirang@gmail.com')->send(new ContactMail($request->all()));

            // Simpan pesan sukses ke session
            return redirect()->route('welcome.index')->with('success', 'Pesan berhasil dikirim!');
        } catch (\Exception $e) {
            // Simpan pesan error ke session
            return redirect()->route('welcome.index')->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }
}
