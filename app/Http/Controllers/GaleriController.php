<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $file = null;

        if ($request->kategori == 'Foto') {

            $request->validate([
                'file' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $file = $request->file('file')->store('galeri', 'public');

        } else {

            $request->validate([
                'file' => 'required|url',
            ]);

            $file = $request->file;
        }

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $file,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->kategori == 'Foto') {

            if ($request->hasFile('file')) {

                $request->validate([
                    'file' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
                ]);

                $data['file'] = $request->file('file')->store('galeri', 'public');
            }

        } else {

            $request->validate([
                'file' => 'nullable|url',
            ]);

            if ($request->filled('file')) {
                $data['file'] = $request->file;
            }
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->delete();

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}
