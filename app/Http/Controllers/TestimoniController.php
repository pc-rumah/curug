<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\delete;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testi = Testimoni::all();
        return view('testi.index', compact('testi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ Validasi Input
        $request->validate([
            'profile' => 'required|image|mimes:jpg,png|max:10240', // Hanya JPG dan PNG, max 2MB
            'nama' => 'required|string|max:255',
            'testi' => 'nullable|string',
        ]);

        // ✅ Upload File
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public'); // Simpan ke storage/app/public/profiles
        } else {
            $profilePath = null;
        }

        // ✅ Simpan ke Database
        Testimoni::create([
            'profile' => $profilePath,
            'nama' => $request->nama,
            'testi' => $request->testi,
        ]);

        // ✅ Redirect dengan Pesan Sukses
        return redirect()->route('testi.index')->with('success', 'Testimoni berhasil ditambahkan!');
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
        $testi = Testimoni::find($id);

        return view('testi.edit', compact('testi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimoni $testi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'profile' => 'nullable|image|mimes:jpg,png,jpeg|max:10240', // Hanya gambar JPG, PNG, JPEG, max 2MB
            'testi' => 'nullable|string',
        ]);

        if ($request->hasFile('profile')) {
            // Hapus file lama jika ada
            if ($testi->profile) {
                Storage::disk('public')->delete($testi->profile);
            }

            // Simpan file baru
            $profilePath = $request->file('profile')->store('profiles', 'public');
        } else {
            $profilePath = $testi->profile; // Gunakan file lama jika tidak diubah
        }

        $testi->update([
            'nama' => $request->nama,
            'profile' => $profilePath,
            'testi' => $request->testi,
        ]);

        // ✅ Redirect dengan Pesan Sukses
        return redirect()->route('testi.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testi = Testimoni::find($id);

        $testi->delete();
        if ($testi->profile) {
            Storage::disk('public')->delete($testi->profile);
        }

        return redirect()->route('testi.index')->with('success', 'Berhasil Menghapus Data');
    }
}
