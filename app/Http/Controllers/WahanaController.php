<?php

namespace App\Http\Controllers;

use App\Models\Wahana;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WahanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wahana = Wahana::all();
        return view('wahana.index', compact('wahana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wahana.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wahana' => 'required',
            'gambar' => 'required|image|mimes:png,jpg|max:10240',
            'deskripsi' => 'required|max:255',
        ], [
            'nama_wahana.required' => 'Nama wahana harus diisi',
            'gambar.required' => 'Gambar wahana harus diisi',
            'gambar.image' => 'Format gambar harus png atau jpg',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 10MB',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('dokumentasi', $filename, 'public');
        }

        Wahana::create([
            'nama_wahana' => $request->nama_wahana,
            'gambar' => $path ?? null,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('wahana.index')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $setting = Setting::first();
        $wahana = Wahana::findOrfail($id);
        return view('dokumentasi.detailw', compact('wahana', 'setting'));
    }

    public function wahana()
    {
        $wahana = Wahana::all();
        $setting = Setting::first();

        return view('dokumentasi.wahana', compact('wahana', 'setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wahana = Wahana::find($id);

        if (!$wahana) {
            return redirect()->route('wahana.index')->with('error', 'Data Tidak di Temukan');
        }

        return view('wahana.edit', compact('wahana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wahana $wahana)
    {
        $request->validate([
            'nama_wahana' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data lama sebelum diupdate
        $oldImage = $wahana->gambar;

        // Perbarui data wahana
        $wahana->nama_wahana = $request->nama_wahana;
        $wahana->deskripsi = $request->deskripsi;

        // Jika ada gambar yang diupload, proses upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($oldImage && Storage::exists('public/' . $oldImage)) {
                Storage::delete('public/' . $oldImage);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('wahana', 'public');
            $wahana->gambar = $path;
        }

        $wahana->save();

        return redirect()->route('wahana.index')->with('success', 'Wahana berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wahana $wahana)
    {
        // Hapus gambar jika ada
        if ($wahana->gambar && Storage::exists('public/' . $wahana->gambar)) {
            Storage::delete('public/' . $wahana->gambar);
        }

        // Hapus data dari database
        $wahana->delete();

        return redirect()->route('wahana.index')->with('success', 'Wahana berhasil dihapus');
    }
}
