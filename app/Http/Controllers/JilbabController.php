<?php

namespace App\Http\Controllers;

use App\Models\Jilbab;
use Illuminate\View\View; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class JilbabController extends Controller
{
    // 1. Menampilkan Semua Data Jilbab (Halaman Tabel CRUD)
    public function index(): View
    {
        $jilbabs = Jilbab::latest()->paginate(5);
        return view('jilbabs.index', compact('jilbabs'));
    }

    // 2. Menampilkan Halaman Tambah Jilbab (Form Admin)
    public function create(): View
    {
        return view('jilbabs.create');
    }

    // 3. Menyimpan Data Jilbab Baru
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        // Upload Gambar ke folder storage/app/public/jilbabs
        $image = $request->file('image');
        $image->storeAs('jilbabs', $image->hashName(), 'public');

        Jilbab::create([
            'image'       => $image->hashName(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock
        ]);

        return redirect()->route('jilbabs.index')->with(['success' => 'Data Jilbab Berhasil Disimpan!']);
    }

    // 4. Menampilkan Detail Jilbab
    public function show(Jilbab $jilbab): View
    {
        return view('jilbabs.show', compact('jilbab'));
    }

    // 5. Menampilkan Halaman Edit Jilbab
    public function edit(Jilbab $jilbab): View
    {
        return view('jilbabs.edit', compact('jilbab'));
    }

    // 6. Mengupdate Data Jilbab
    public function update(Request $request, Jilbab $jilbab): RedirectResponse
    {
        $request->validate([
            'image'       => 'image|mimes:jpeg,jpg,png,webp|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        if ($request->hasFile('image')) {
            
            // Ambil nama file asli dari database, abaikan URL dari Accessor
            $oldImage = $jilbab->getRawOriginal('image');

            // 1. Hapus gambar lama dari storage (jika ada dan bukan default.png)
            if ($oldImage && $oldImage !== 'default.png') {
                Storage::disk('public')->delete('jilbabs/' . $oldImage);
            }

            // 2. Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('jilbabs', $image->hashName(), 'public');

            $jilbab->update([
                'image'       => $image->hashName(),
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock
            ]);
        } else {
            // Update tanpa ganti gambar
            $jilbab->update([
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock
            ]);
        }

        return redirect()->route('jilbabs.index')->with(['success' => 'Data Jilbab Berhasil Diubah!']);
    }

    // 7. Menghapus Data Jilbab
    public function destroy(Jilbab $jilbab): RedirectResponse
    {
        // Ambil nama file asli dari database, abaikan URL dari Accessor
        $oldImage = $jilbab->getRawOriginal('image');

        // Hapus gambar dari storage jika bukan default.png
        if ($oldImage && $oldImage !== 'default.png') {
            Storage::disk('public')->delete('jilbabs/' . $oldImage);
        }

        $jilbab->delete();

        return redirect()->route('jilbabs.index')->with(['success' => 'Data Jilbab Berhasil Dihapus!']);
    }
}