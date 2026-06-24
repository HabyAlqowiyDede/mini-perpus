@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="main-content  ">
        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Buku</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalBuku }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                               {{ $totalUser }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-warning">
                            <i class="ion ion-paper-airplane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Peminjaman Hari</h4>
                            </div>
                            <div class="card-body">
                               {{ $totalPeminjamanHariIni}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @role('admin')
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">

                                <h4>Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Peminjam</th>
                                        <th>Buku</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($peminjamanTerbaru as $pinjam)
                                        <tr>
                                            <td>{{ $pinjam->user->name }}</td>
                                            <td>{{ $pinjam->buku->judul }}</td>
                                            <td>{{ $pinjam->tanggal_pinjam }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                Belum ada data
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endrole
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($hari),
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: @json($jumlah),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
    </section>
@endsection
