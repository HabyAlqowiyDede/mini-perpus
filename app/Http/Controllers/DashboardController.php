<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
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
        $totalUser = User::whereHas('roles', function ($q) {
            $q->where('name', 'user');
        })->count();

        $totalPeminjamanHariIni = Peminjaman::whereDate(
            'tanggal_pinjam',
            Carbon::today()
        )->count();
        // Tambahkan ini
        $peminjamanTerbaru = Peminjaman::with(['user', 'buku'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalBuku',
            'totalUser',
            'hari',
            'totalPeminjamanHariIni',
            'jumlah',
            'peminjamanTerbaru'
        ));
    }
}
