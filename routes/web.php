<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// auth
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_process'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('signin');
Route::get('/logout', [AuthController::class, 'logout'])->name('signout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function (){
Route::get('/create', [BukuController::class, 'create'])->name('create');
Route::post('/store', [BukuController::class, 'store'])->name('store');
Route::get('/editbuku', [BukuController::class, 'edit'])->name('editbuku');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
// kelola peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index'])
    ->name('peminjaman');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
Route::get('/Peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/Peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::post('/peminjaman/{id}/kembalikan',[PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');

Route::get('/UserManage', [UserController::class, 'index'])
    ->name('usermanage');
Route::get('/user/{id}/peminjaman', [UserController::class, 'detailPeminjaman'])->name('user.peminjaman');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');
});


// Kelola Buku
Route::get('/KelolaBuku', [BukuController::class, 'index'])->name('databuku');
Route::get('/riwayat-peminjaman', [UserController::class, 'riwayat'])->name('riwayat.peminjaman');

//user manage



