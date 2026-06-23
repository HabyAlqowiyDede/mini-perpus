@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Edit Peminjaman</h4>
            <div>
                <a href="{{ route('peminjaman') }}">Kembali</a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('peminjaman.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group my-2">
                    <label>User</label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ $data->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-2">
                    <label>Buku</label>
                    <select name="buku_id" class="form-control">
                        @foreach ($bukus as $buku)
                            <option value="{{ $buku->id }}"
                                {{ $data->buku_id == $buku->id ? 'selected' : '' }}>
                                {{ $buku->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-2">
                    <label>Tanggal Pinjam</label>
                    <input type="date"
                        name="tanggal_pinjam"
                        class="form-control"
                        value="{{ old('tanggal_pinjam', $data->tanggal_pinjam) }}">
                </div>

                <div class="form-group my-2">
                    <label>Tanggal Kembali</label>
                    <input type="date"
                        name="tanggal_kembali"
                        class="form-control"
                        value="{{ old('tanggal_kembali', $data->tanggal_kembali) }}">
                </div>

                <div class="form-group my-2">
                    <label>Jumlah</label>
                    <input type="number"
                        name="jumlah"
                        class="form-control"
                        value="{{ old('jumlah', $data->jumlah) }}">
                    @error('jumlah')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="my-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        Update Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection