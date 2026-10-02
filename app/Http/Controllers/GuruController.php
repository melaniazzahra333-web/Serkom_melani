<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Http\Request;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $gurus = Guru::all();

        // return view('admin.guru.index', compact('gurus'));

        $search = $request->search;

        $gurus = Guru::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama_guru', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%')
                    ->orWhere('jabatan', 'like', '%' . $search . '%')
                    ->orWhere('mapel', 'like', '%' . $search . '%');
            })
            ->get();

        return view('admin.guru.index', compact('gurus', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto-guru', 'public');
        }

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'jabatan' => $request->jabatan,
            'foto' => $foto
        ]);

        return redirect()->route('admin.guru');

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
        //
         $guru = Guru::findOrFail($id); 

        return view('admin.guru.edit', compact('guru'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
            'jabatan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'jabatan' => $request->jabatan,
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto-guru', 'public');

            $guru->update([
                'foto' => $foto,
            ]);
        }

        return redirect()->route('admin.guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.guru');
    }

}
