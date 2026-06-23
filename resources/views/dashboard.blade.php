@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="main-content  ">
        <section class="section">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-primary">
                            <i class="ion ion-person"></i>
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
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-danger">
                            <i class="ion ion-ios-paper-outline"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>News</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-warning">
                            <i class="ion ion-paper-airplane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-success">
                            <i class="ion ion-record"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
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
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-1.jpeg"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right"><small>10m</small></div>
                                        <div class="media-title">Farhan A Mujib</div>
                                        <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                            sollicitudin.</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-2.jpeg"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right"><small>10m</small></div>
                                        <div class="media-title">Ujang Maman</div>
                                        <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                            sollicitudin.</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-3.jpeg"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right"><small>10m</small></div>
                                        <div class="media-title">Rizal Fakhri</div>
                                        <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                            sollicitudin.</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-4.jpeg"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right"><small>10m</small></div>
                                        <div class="media-title">Alfa Zulkarnain</div>
                                        <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                            sollicitudin.</small>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
    </div>

    </section>
@endsection
