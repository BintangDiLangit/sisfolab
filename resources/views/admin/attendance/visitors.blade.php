@extends('layouts.master')
@section('title')
    Presensi Pengunjung
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengunjung</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengunjung</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Hari Tanggal</th>
                            <th scope="col">Nomor Identitas</th>
                            <th scope="col">Nama Pengunjung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitors as $key => $visitor)
                            <tr>
                                <th scope="row">{{ $loop->iteration }} </th>
                                <td>{{ date('m/d/Y', strtotime($visitor->created_at)) }}
                                </td>
                                <td>{{ $visitor->identityNum }}</td>
                                <td>{{ $visitor->name }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
