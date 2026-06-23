<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        $totalBuku = Buku::count();
        return view('dashboard', compact('totalBuku'));
    }
}
