<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        
    $search = $request->search;
    $status = $request->status;

    $pengumuman = Pengumuman::query()
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%')
                  ->orWhere('tanggal', 'like', '%' . $search . '%');
            });
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->get();

        return view('admin.pengumuman.index', compact(
            'pengumuman',
            'search',
            'status'
        ));
    }


    public function create()
    {
        return view('admin.pengumuman.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ]);


        $user = User::first();

        if (!$user) {
            return back()
                ->withInput()
                ->with('error', 'Belum ada user yang tersedia.');
        }


        Pengumuman::create([
            'id_pengumuman' => (string) Str::uuid(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => $user->id_user,
        ]);


        return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view(
            'admin.pengumuman.edit',
            compact('pengumuman')
        );
    }


    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ]);


        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);


        return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();


        return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
