@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Material</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Material</li>
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
                            <h3 class="card-title">Data Material</h3>
                            <a href="{{ route('material.create') }}" class="btn btn-success" style="float: right">Tambah
                                Material</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materials as $key => $material)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td> {{ $material->kategori }} </td>
                                            <td> {{ $material->name }} </td>
                                            <td> {{ $material->stock }} </td>
                                            <td> {{ $material->desc }} </td>
                                            <td>
                                                <a href="{{ route('material.edit', ['material' => $material]) }}"
                                                    class="btn btn-info"><i class="fa fa-pencil"></i> Edit </a>
                                                <a href="{{ route('material.destroy', ['material' => $material]) }}"
                                                    type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteConf{{ $material->id }}"><i
                                                        class="fa fa-trash"></i>
                                                    Delete
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteConf{{ $material->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteConfLabel">
                                                                    Hapus Data Material</h5>
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
                                                                    action="{{ route('material.destroy', ['material' => $material]) }}"
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
                                <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot>
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
