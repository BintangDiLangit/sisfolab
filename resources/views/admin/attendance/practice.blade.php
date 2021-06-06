@extends('layouts.master')
@section('title')
    Presensi Praktikum
@endsection
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Praktikum</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Praktikum</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Hari Tanggal</th>
                            <th scope="col">Matkul</th>
                            <th scope="col">Lab</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Nama Praktikkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($practice as $key => $practice)
                            <tr>
                                <th scope="row">{{ $loop->iteration }} </th>
                                <td scope="row">
                                    {{ date('m/d/Y', strtotime($practice->created_at)) }}
                                </td>
                                <td>{{ $practice->matkul->namaMatkul }}</td>
                                <td>{{ $practice->lab->namaLab }}</td>
                                <td>{{ $practice->lecturerName }} </td>
                                <td>{{ $practice->namaAnggota }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
