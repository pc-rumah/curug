<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasi = Dokumentasi::all();
        return view('dokumentasi.index', compact('dokumentasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokumentasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,png|max:10240',
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('dokumentasi', $filename, 'public');
        }

        // Simpan ke database
        Dokumentasi::create([
            'thumbnail' => $path ?? null, // Simpan path gambar
            'nama_pengunjung' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokumentasi = Dokumentasi::find($id);

        if (!$dokumentasi) {
            abort(404, 'Foto Tidak di Temukan');
        }

        return view('dokumentasi.edit', compact('dokumentasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:10240', // Hanya gambar JPG, PNG, JPEG, max 2MB
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus file lama jika ada
            if ($dokumentasi->thumbnail) {
                Storage::disk('public')->delete($dokumentasi->thumbnail);
            }

            // Simpan file baru
            $thumbnailPath = $request->file('thumbnail')->store('dokumentasi', 'public');
        } else {
            $thumbnailPath = $dokumentasi->thumbnail; // Gunakan file lama jika tidak diubah
        }

        $dokumentasi->update([
            'nama_pengunjung' => $request->nama,
            'thumbnail' => $thumbnailPath,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        // ✅ Redirect dengan Pesan Sukses
        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokumentasi = Dokumentasi::find($id);

        if (!$dokumentasi) {
            return redirect()->route('dokumentasi.index')->with('error', 'Data Tidak di Temukan');
        }

        $dokumentasi->delete();

        if ($dokumentasi->thumbnail) {
            Storage::disk('public')->delete($dokumentasi->thumbnail);
        }

        return redirect()->route('dokumentasi.index')->with('success', 'Berhasil Menghapus Data');
    }
}
