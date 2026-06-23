<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>
@extends('layouts.app')

@section('title')
    Detail Peminjaman
@endsection

@section('content')

<div class="main-content">

    <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Riwayat Peminjaman {{ $user->name }}</h4>
            <div>
                <a href="{{ route('usermanage') }}">Kembali</a>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($peminjaman as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->buku->judul }}</td>

                        <td>{{ $item->tanggal_pinjam }}</td>

                        <td>{{ $item->tanggal_kembali }}</td>

                        <td>
                            @if($item->status == 'dipinjam')
                                <span class="badge badge-warning">
                                    Dipinjam
                                </span>
                            @else
                                <span class="badge badge-success">
                                    Dikembalikan
                                </span>
                            @endif
                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection