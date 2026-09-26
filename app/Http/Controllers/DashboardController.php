<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\Profil;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();
        $totalBerita = Berita::count();
        $totalPrestasi = Prestasi::count();

        $profil = Profil::first();

        $beritaTerbaru = Berita::latest()->take(5)->get();
        $guruTerbaru = Guru::latest()->take(5)->get();

        return view('admin.dasboard', compact(
            'totalGuru',
            'totalSiswa',
            'totalBerita',
            'totalPrestasi',
            'profil',
            'beritaTerbaru',
            'guruTerbaru'
        ));
    }
}
