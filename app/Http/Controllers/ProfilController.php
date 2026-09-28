<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();

        return view('admin.profil.index', compact('profil'));
    }

    public function create()
    {
        // Jika profil sudah ada, langsung ke halaman edit
        $profil = Profil::first();

        if ($profil) {
            return redirect()->route('admin.profil.edit', $profil->id_profil);
        }

        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_sekolah' => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'visi_misi' => 'required|string',
            'tahun_berdiri' => 'required|integer|digits:4',
            'deskripsi' => 'required|string',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // Cegah membuat profil kedua
        $profil = Profil::first();

        if ($profil) {
            return redirect()
                ->route('admin.profil.edit', $profil->id_profil)
                ->with('success', 'Profil sekolah sudah tersedia. Silakan edit profil yang ada.');
        }

        // FOTO
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('profil', 'public');
        }

        // LOGO
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

            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
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
}
