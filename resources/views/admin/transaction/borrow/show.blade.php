@extends('layouts.master')
@section('title')
    Detail Peminjaman
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div>
            </div>
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        @if ($borrow->users->first()->role_id == 1)
                            <h3>Dari Admin</h3>
                        @elseif ($borrow->users->first()->role_id == 2)
                            <h3>Dari Mahasiswa</h3>
                        @elseif ($borrow->users->first()->role_id == 4)
                            <h3>Dari Tenaga Kependidikan</h3>
                        @else
                            <h3>Instansi Lain</h3>
                        @endif

                        <div class="title_left mb-3">
                            <label for="">Detail Peminjam : </label>
                            <h4>{{ $borrow->users->first()->name }}</h4>
                            <h4>: {{ $borrow->users->first()->noId }}</h4>

                        </div>
                    </div>
                    <div class="title_right" style="float: right">


                    </div>
                    <div class="title_right mb-3">
                        <div class="col-sm-12 mt-3 text-right">
                            <a href="{{ route('borrow.index') }}" class="btn btn-danger btn-xs"><i
                                    class="fa fa-mail-reply"></i>
                                Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Barang</th>
                                        <th scope="col">Jumlah yang dipinjam</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrow->materials as $material)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <th scope="row">{{ $material->name }}</th>
                                            <th scope="row">{{ $material->pivot->borrowAmount }}</th>

                                            <th scope="row">
                                                @if ($borrow->status == 1)
                                                    Masih dipinjam
                                                @else
                                                    Sudah dikembalikan
                                                @endif
                                            </th>
                                            <th scope="row">
                                                <form action="{{ route('borrow.destroy', $borrow->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-danger {{ $borrow->status == 0 ? 'disabled' : '' }}"><i
                                                            class="fa fa-trash"></i>
                                                        Hapus </button>
                                                </form>
                                                <a href="{{ route('edit.borrow.material', ['material' => $material, 'borrow' => $borrow]) }}"
                                                    class="btn btn-info btn-xs {{ $borrow->status == 0 ? 'disabled' : '' }}"><i
                                                        class="fa fa-info-circle"></i>
                                                    Edit
                                                </a>
                                            </th>
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
@endsection
