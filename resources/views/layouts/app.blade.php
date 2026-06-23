<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title> @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/dist/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/dist/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">
</head>

<body>
    <div id="app" class="header-scroll">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="ion ion-navicon-round"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="ion ion-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn" type="submit"><i class="ion ion-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg">
                            <i class="ion ion-android-person d-lg-none"></i>
                            <div class="d-sm-none d-lg-inline-block">
                                Selamat Datang, {{ auth()->user()->name }}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile.html" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Profile
                            </a>
                            <a href="{{ route('signout') }}" class="dropdown-item has-icon">
                                <i class="ion ion-log-out"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            {{-- SIDEBAR --}}

            @role('admin')
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="index.html">Panel Admin</a>
                        </div>
                        <div class="sidebar-user">
                        </div>
                        <ul class="sidebar-menu">
                            <li class="active">
                                <a href="{{ route('dashboard') }}"><i
                                        class="ion ion-speedometer"></i><span>Dashboard</span></a>
                            </li>
                            <li class="active">
                                <a href="{{ route('databuku') }}"><i class="fas fa-book"></i><span>Kelola Buku</span></a>
                            </li>
                            <li class="active">
                                <a href="{{ route('peminjaman') }}"><i class="fas fa-book"></i><span>Kelola
                                        pinjaman</span></a>
                            </li>
                            <li class="active">
                                <a href="{{ route('usermanage') }}"><i class="fas fa-user"></i><span>User
                                        Manage</span></a>
                            </li>
                        @endrole
                        @role('user')
                            <div class="main-sidebar">
                                <aside id="sidebar-wrapper">
                                    <div class="sidebar-brand">
                                        <a href="index.html">Mini-Perpus</a>
                                    </div>
                                    <div class="sidebar-user">
                                    </div>
                                    <ul class="sidebar-menu">
                                        <li class="active">
                                            <a href="{{ route('dashboard') }}"><i
                                                    class="ion ion-speedometer"></i><span>Dashboard</span></a>
                                        </li>
                                        <li class="active">
                                            <a href="{{ route('databuku') }}"><i
                                                    class="fas fa-book"></i><span>Buku</span></a>
                                        </li>
                                        <li class="active">
                                            <a href="{{ route('peminjaman') }}"><i
                                                    class="fas fa-book"></i><span>pinjaman</span></a>
                                        </li>
                                        <li class="active">
                                             <a href="{{ route('riwayat.peminjaman') }}"><i
                                                    class="fas fa-book"></i><span>Riwayat Peminjaman</span>
                                            </a>
                                        </li>
                                    @endrole
                            </aside>
                        </div>

                        <main class="py-5">
                            @yield('content')
                        </main>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a
                        href="https://multinity.com/">Multinity</a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('/dist/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('/dist/modules/popper.js') }}"></script>
    <script src="{{ asset('/dist/modules/tooltip.js') }}"></script>
    <script src="{{ asset('/dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
    <script src="{{ asset('/dist/js/sa-functions.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js')}}"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script src="/dist/modules/chart.min.js"></script>
    <script src="{{ '/dist/modules/summernote/summernote-lite.js' }}"></script>
    $(document).ready(function () {
    $('#table').DataTable({
    pageLength: 10,
    lengthChange: false,
    searching: true,
    ordering: true,
    language: {
    search: "",
    searchPlaceholder: "Search..."
    }
    });
    });
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    label: 'Statistics',
                    data: [460, 458, 330, 502, 430, 610, 488],
                    borderWidth: 2,
                    backgroundColor: 'rgb(87,75,144)',
                    borderColor: 'rgb(87,75,144)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>
    <script src="{{ asset('/dist/js/scripts.js') }}"></script>
    <script src="{{ asset('/dist/js/custom.js') }}"></script>
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
</body>

</html>
