@extends('layouts.master')
@section('title')
    Edit Peminjaman
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
            <div class="page-title">
                <div class="title_left mb-3">
                    <label for="">Peminjam : </label>
                    <h3>{{ $borrow->users->first()->name }} : {{ $borrow->users->first()->noId }}</h3>
                    @if ($borrow->users->first()->role_id == 1)
                        <h3>Dari Admin</h3>
                    @elseif ($borrow->users->first()->role_id == 2)
                        <h3>Dari Mahasiswa</h3>
                    @elseif ($borrow->users->first()->role_id == 4)
                        <h3>Dari Tenaga Kependidikan</h3>
                    @else
                        <h3>Instansi Lain</h3>
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="">


                <div class="clearfix"></div>

                <div class="row">
                    <!-- form input mask -->
                    <div class="col">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Detail Peminjaman</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form class="form-horizontal form-label-left"
                                    action="{{ route('update.borrow.material', ['material' => $material, 'borrow' => $borrow]) }}"
                                    method="post" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Barang</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" class="form-control"
                                                value="{{ $material->name . ' {' . $material->stock . '} ' }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jumlah Peminjaman</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="number" min=1 class="form-control" name="jumlah" @foreach ($borrow->materials as $m)  @if ($material->id==$m->id)
                                            value={{ $m->pivot->borrowAmount }} @endif
                                            @endforeach >
                                            <input type="hidden" min=1 class="form-control" name="jumlahOld" @foreach ($borrow->materials as $m)  @if ($material->id==$m->id)
                                            value={{ $m->pivot->borrowAmount }} @endif
                                            @endforeach >
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>

                                    <div class="form-group row">
                                        <div class="col-md-9 offset-md-3">
                                            <a href="{{ route('borrow.show', ['borrow' => $borrow]) }}"
                                                class="btn btn-danger btn-xs"><i class="fa fa-mail-reply"></i>
                                                Back
                                            </a>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /form input mask -->
                </div>
            </div>
        </div>
    </section>

@endsection
