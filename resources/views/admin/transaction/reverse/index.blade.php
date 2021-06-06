@extends('layouts.master')
@section('title')
    Pengembalian
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengembalian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengembalian</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Tgl Pengembalian</th>
                                            <th scope="col">ID Peminjaman</th>
                                            <th scope="col">Jenis Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reverses as $key => $reverse)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <th scope="row">{{ $reverse->created_at }}</th>
                                                <th scope="row">{{ $reverse->borrow_id }}</th>
                                                <th scope="row">{{ $reverse->materials }}</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
