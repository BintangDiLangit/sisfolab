@extends('layouts.master')
@section('title')
    Peminjaman
@endsection
@section('content')
    {{-- <h2 style="font-size: 0.7rem">Date Format : MM/DD/YYYY</h2> --}}
    {{-- <p id="date_filter">
    <span id="date-label-from" class="date-label">From: </span><input
        class="date_range_filter date" type="text" id="datepicker_from" />
    <span id="date-label-to" class="date-label">To:<input class="date_range_filter date"
            type="text" id="datepicker_to" />
</p> --}}
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
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Peminjaman</h3>
                            <a href="{{ route('borrow.create') }}" class="btn btn-success" style="float: right">Tambah
                                Peminjaman</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Peminjaman</th>
                                        <th scope="col">No Identitas</th>
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">ID Peminjaman</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrows as $key => $borrow)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td scope="row">
                                                {{ date('m/d/Y', strtotime($borrow->created_at)) }}
                                            </td>

                                            @foreach ($borrow->users as $user)
                                            @endforeach
                                            <td scope="row">
                                                {{ $user->noId }}
                                            </td>
                                            <td scope="row">
                                                {{ $user->username }}
                                            </td>


                                            <td scope="row">
                                                {{ $borrow->id }}
                                            </td>

                                            <td scope="row">
                                                @if ($borrow->status == 1)
                                                    Masih dipinjam
                                                @else
                                                    Sudah dikembalikan
                                                @endif
                                            </td>
                                            <td scope="row">
                                                <!-- Button trigger modal Destroy -->
                                                <a href="{{ route('borrow.destroy', ['borrow' => $borrow]) }}"
                                                    type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteConf{{ $borrow->id }}"><i class="fa fa-trash"></i>
                                                    Delete
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteConf{{ $borrow->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteConfLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteConfLabel">
                                                                    Hapus Data Peminjaman</h5>
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
                                                                    action="{{ route('borrow.destroy', ['borrow' => $borrow]) }}"
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

                                                <br>

                                                <a href="{{ route('borrow.show', ['borrow' => $borrow]) }}"
                                                    class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i>
                                                    Detail
                                                </a>

                                                <br>
                                                <!-- Button trigger modal Approve -->
                                                <a href="{{ route('approve', ['borrow' => $borrow]) }}" type="button"
                                                    class="btn btn-success {{ $borrow->status == 0 ? 'disabled' : '' }}"
                                                    data-toggle="modal" data-target="#approveConf{{ $borrow->id }}"><i
                                                        class="fa fa-thumbs-o-up "></i>
                                                    Approve
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="approveConf{{ $borrow->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="approveConfLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="approveConfLabel">
                                                                    Pengembalian</h5>
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
                                                                    action="{{ route('approve', ['borrow' => $borrow]) }}"
                                                                    method="POST">
                                                                    @csrf
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
@endsection
