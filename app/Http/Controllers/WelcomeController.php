<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Testimoni;
use App\Models\Dokumentasi;
use App\Models\Pengurus;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::all();
        $wahana = Wahana::all();
        $setting = Setting::first();
        $testimoni = Testimoni::all();
        $dokumentasi = Dokumentasi::latest()->take(6)->get();
        return view('welcome', compact('dokumentasi', 'testimoni', 'setting', 'wahana', 'pengurus'));
    }

    public function show(string $id)
    {
        $setting = Setting::first();
        $dokumentasi = Dokumentasi::findOrfail($id);
        return view('dokumentasi.details', compact('dokumentasi', 'setting'));
    }

    public function all()
    {
        $setting = Setting::first();
        $dokumentasi = Dokumentasi::all();
        return view('dokumentasi.all', compact('dokumentasi', 'setting'));
    }

    public function page()
    {
        $welcome = Setting::first();
        return view('setting.index', compact('welcome'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul_halaman' => 'required|string|max:255',
            'text_sambutan' => 'required|string|max:500',
            'desc_sambutan' => 'required|string|max:1000',
            'desc_web' => 'required|string|max:1000',
            'alamat' => 'required|string|max:255',
            'sampul' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Gambar opsional
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'twitter' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
        ]);

        // Ambil data welcome yang sudah ada
        $welcome = Setting::first();

        // Jika data belum ada, buat baru
        if (!$welcome) {
            $welcome = new Setting();
        }

        // Handle upload file baru
        if ($request->hasFile('sampul')) {
            // Hapus file lama jika ada
            if ($welcome->sampul) {
                Storage::delete('public/' . $welcome->sampul);
            }

            // Simpan file baru
            $sampulPath = $request->file('sampul')->store('sampul', 'public');
            $welcome->sampul = $sampulPath;
        }

        // Update data
        $welcome->judul_halaman = $request->judul_halaman;
        $welcome->text_sambutan = $request->text_sambutan;
        $welcome->desc_sambutan = $request->desc_sambutan;
        $welcome->desc_web = $request->desc_web;
        $welcome->alamat = $request->alamat;
        $welcome->phone = $request->phone;
        $welcome->email = $request->email;
        $welcome->twitter = $request->twitter;
        $welcome->instagram = $request->instagram;
        $welcome->facebook = $request->facebook;

        // Simpan perubahan
        $welcome->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}
