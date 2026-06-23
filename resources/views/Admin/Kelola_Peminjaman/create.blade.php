@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Tambah Peminjaman</h4>
                <a href="{{ route('peminjaman') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    {{-- Nama Peminjam --}}
                    <div class="form-group my-2">
                        <label for="user_id">Nama Peminjam</label>
                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">-- Pilih Peminjam --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('user_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Buku --}}
                    <div class="form-group my-2">
                        <label for="buku_id">Buku</label>
                        <select name="buku_id" id="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                            <option value="">-- Pilih Buku --</option>

                            @foreach ($bukus as $buku)
                                <option value="{{ $buku->id }}">
                                    {{ $buku->judul }} (Stok: {{ $buku->stok }})
                                </option>
                            @endforeach
                        </select>

                        @error('buku_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Tanggal Pinjam --}}
                    <div class="form-group my-2">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                            class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                            value="{{ old('tanggal_pinjam') }}">

                        @error('tanggal_pinjam')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Tanggal Kembali --}}
                    <div class="form-group my-2">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                            class="form-control @error('tanggal_kembali') is-invalid @enderror"
                            value="{{ old('tanggal_kembali') }}">

                        @error('tanggal_kembali')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Total Pinjam</label>
                        <input type="number" name="jumlah" min="1" max="3" value="1" class="form-control" required>
                    </div>

                    {{-- Status --}}
                    <div class="form-group my-2">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" value="Dipinjam" readonly>

                        <input type="hidden" name="status" value="dipinjam">
                    </div>

                    <div class="my-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Simpan Peminjaman
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
