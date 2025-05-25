<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $struktur = Pengurus::all();
        return view('pengurus.index', compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'foto_profile' => 'required|image|mimes:png,jpg|max:10240',
            'no_telp' => 'required|numeric',
            'email' => 'required|email',
            'instagram' => 'required',
            'jabatan' => 'required|max:255',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('pengurus', $filename, 'public');
        }

        // Simpan ke database
        Pengurus::create([
            'foto_profile' => $path ?? null, // Simpan path gambar
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('struktur.index')->with('success', 'Data berhasil disimpan!');
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
        $struktur = Pengurus::find($id);

        if (!$struktur) {
            return redirect()->route('struktur.index')->with('success', 'Data Tidak di Temukan');
        }

        return view('pengurus.edit', compact('struktur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengurus $struktur)
    {
        $request->validate([
            'name' => 'required|max:255',
            'foto_profile' => 'nullable|image|mimes:png,jpg|max:10240',
            'no_telp' => 'required|numeric',
            'email' => 'required',
            'instagram' => 'required',
            'jabatan' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.numeric' => 'Nomor telepon harus berupa angka.',
            'email.required' => 'Email wajib diisi.',
            'instagram.required' => 'Instagram wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
        ]);
        // dd($request->all());

        if ($request->hasFile('foto_profile')) {
            if ($struktur->foto_profile) {
                Storage::disk('public')->delete($struktur->foto_profile);
            }

            $foto_profile = $request->file('foto_profile')->store('foto_profile', 'public');
        } else {
            $foto_profile = $struktur->foto_profile;
        }

        $struktur->update([
            'name' => $request->name,
            'foto_profile' => $foto_profile,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'jabatan' => $request->jabatan,
        ]);

        // ✅ Redirect dengan Pesan Sukses
        return redirect()->route('struktur.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $struktur = Pengurus::find($id);

        if (!$struktur) {
            return redirect()->route('struktur.index')->with('error', 'Data Tidak di Temukan');
        }

        $struktur->delete();

        if ($struktur->thumbnail) {
            Storage::disk('public')->delete($struktur->thumbnail);
        }

        return redirect()->route('struktur.index')->with('success', 'Berhasil Menghapus Data');
    }
}
