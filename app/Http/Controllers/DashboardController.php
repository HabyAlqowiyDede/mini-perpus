<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::selectRaw('DAYNAME(tanggal_pinjam) as hari, COUNT(*) as jumlah')
            ->groupBy('hari')
            ->pluck('jumlah', 'hari');

        $hari = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ];

        $jumlah = [];

        foreach ($hari as $h) {
            $jumlah[] = $peminjaman[$h] ?? 0;
        }

        $totalBuku = Buku::count();

        return view('dashboard', compact('totalBuku', 
                                            'hari', 
                                            'jumlah'));
    }
}