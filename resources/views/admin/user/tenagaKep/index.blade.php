@extends('layouts.master')
@section('title')
    Tenaga Kependidikan
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tenaga Kependidikan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tenaga Kependidikan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Tenaga Kependidikan</h3>
                            <a href="{{ route('user.dosen.create') }}" class="btn btn-success" style="float: right">Tambah
                                Data Tenaga Kependidikan</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama Tenaga Kep.</th>
                                        <th scope="col">No. Telepon</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tkp as $key => $tkp)
                                        <tr>
                                            <th scope="row"> {{ $loop->iteration }} </th>
                                            <td> {{ $tkp->noId }} </td>
                                            <td> {{ $tkp->username }} </td>
                                            <td> {{ $tkp->tlp }} </td>
                                            <td> {{ $tkp->address }} </td>
                                            <td>
                                                <a href="{{ route('user.dosen.edit', ['dosen' => $tkp]) }}"
                                                    class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <a href="{{ route('user.dosen.destroy', ['dosen' => $tkp]) }}"
                                                    type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteConf{{ $tkp->id }}"><i class="fa fa-trash"></i>
                                                    Delete
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteConf{{ $tkp->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteConfLabel">
                                                                    Hapus Data Tenaga Kependidikan</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">x</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Yakin?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-link" data-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <form
                                                                    action="{{ route('user.dosen.destroy', ['dosen' => $tkp]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="btn btn-success">Iya</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
