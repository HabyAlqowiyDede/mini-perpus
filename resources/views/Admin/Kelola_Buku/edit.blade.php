@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Tambah Buku</h4>
                <div>
                    <a href="{{ route('databuku')}}">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul')
                        is-invalid
                        @enderror" value="{{old('judul', $buku->judul)}}" autofocus>
                            
                        @error('judul')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="genre">Genre</label>
                        <input type="text" name="genre" id="genre" class="form-control @error('genre')
                        is-invalid
                        @enderror" value="{{old('genre', $buku->genre)}}">
                        @error('genre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" class="form-control @error('pengarang')
                        is-invalid
                        @enderror" value="{{old('pengarang', $buku->pengarang)}}">
                        @error('pengarang')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                    <div class="form-group my-2">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control @error('penerbit')
                        is-invalid
                        @enderror" value="{{old('penerbit', $buku->penerbit)}}">
                        @error('penerbit')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                         <div class="form-group my-2">
                        <label for="stok">stok</label>
                        <input type="number" name="stok" id="stok" class="form-control @error('stok')
                        is-invalid
                        @enderror" value="{{old('stok', $buku->stok)}}">
                        @error('stok')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                        <div class="my-2 d-flex justify-content-end">
                        <button class="btn btn-primary">
                                Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection