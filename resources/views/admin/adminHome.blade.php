@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Mahasiswa</span>
                            <span class="info-box-number">{{ $countMhs }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tenaga Pengajar</span>
                            <span class="info-box-number">{{ $countDosen }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Instansi Lain</span>
                            <span class="info-box-number">{{ $countInstansi }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Alat</span>
                            <span class="info-box-number">{{ $countAlat }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.row -->

            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Peminjaman</span>
                            <span class="info-box-number">{{ $countPinjam }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengembalian</span>
                            <span class="info-box-number">{{ $countKembali }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-edit"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Presensi Pengunjung</span>
                            <span class="info-box-number">{{ $countPengunjung }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-edit"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Presensi Praktikum</span>
                            <span class="info-box-number">{{ $countPraktikum }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">User</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>
        var myChart1 = document.getElementById('donutChart').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        var massPopChart = new Chart(myChart1, {
            type: 'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Tenaga Kependidikan', 'Mahasiswa', 'Instansi Lain'],
                datasets: [{
                    data: [
                        {{ $countDosen }},
                        {{ $countMhs }},
                        {{ $countInstansi }},
                    ],
                    // backgroundColor: 'green',
                    backgroundColor: [
                        '#6cd7bd',
                        '#0abc91',
                        '#055e49',
                    ],
                    borderWidth: 1,
                    borderColor: 'white',
                    hoverBorderWidth: 3,
                    hoverBorderColor: 'white'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Data User',
                    fontSize: 25,
                    responsive: true,
                    fontColor: 'white'
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: 'white'
                    }
                },



            }
        });

        var myChart2 = document.getElementById('pieChart').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        var massPopChart = new Chart(myChart2, {
            type: 'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Peminjaman', 'Pengembalian', 'Belum Kembali'],
                datasets: [{
                    // label: 'Population',
                    data: [
                        {{ $countPinjam }},
                        {{ $countKembali }},
                        {{ $countBelumDikembalikan }},
                    ],
                    // backgroundColor: 'green',
                    backgroundColor: [
                        '#f39c12',
                        '#f7c26f',
                    ],
                    borderWidth: 1,
                    borderColor: 'white',
                    hoverBorderWidth: 3,
                    hoverBorderColor: 'white'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Data User',
                    fontSize: 25,
                    responsive: true,
                    fontColor: 'white'
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: 'white'
                    }
                },



            }
        });

    </script>
@endpush
