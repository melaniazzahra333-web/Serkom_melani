<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::all();

        return view('admin.profil.index', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:255',
            'kepala_sekolah' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'npsn' => 'nullable|max:50',
            'alamat' => 'nullable',
            'kontak' => 'nullable|max:100',
            'visi_misi' => 'nullable',
            'tahun_berdiri' => 'nullable|max:10',
            'deskripsi' => 'nullable',
        ]);

        $data = [
            'nama_sekolah' => $request->nama_sekolah,
            'kepala_sekolah' => $request->kepala_sekolah,
            'npsn' => $request->npsn,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'visi_misi' => $request->visi_misi,
            'tahun_berdiri' => $request->tahun_berdiri,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('profil', 'public');
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('profil', 'public');
        }

        Profil::create($data);

        return redirect()
            ->route('admin.profil')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

    $data = $request->validate([
        'nama_sekolah' => 'required|string|max:40',
        'kepala_sekolah' => 'required|string|max:40',
        'npsn' => 'required|string|max:10',
        'alamat' => 'required|string',
        'kontak' => 'required|string|max:15',
        'visi_misi' => 'required|string',
        'tahun_berdiri' => 'required|integer|digits:4',
        'deskripsi' => 'required|string',

        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // FOTO
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')
            ->store('profil', 'public');
    } else {
        $data['foto'] = $profil->foto;
    }

    // LOGO
    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')
            ->store('profil', 'public');
    } else {
        $data['logo'] = $profil->logo;
    }

    $profil->update($data);

    return redirect()
        ->route('admin.profil')
        ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);

        $profil->delete();

        return redirect()
            ->route('admin.profil')
            ->with('success', 'Profil sekolah berhasil dihapus.');
    }
}
