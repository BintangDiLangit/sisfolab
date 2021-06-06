@extends('layouts.master')
@section('title')
    Edit Data Mahasiswa
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Form</li>
                    </ol>
                </div>
            </div>
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Data Mahasiswa</h3>
                    <h2>{{ $user->noId }} - {{ $user->username }}</h2>
                </div>

                <div class="title_right">
                </div>
            </div>
        </div>
    </section>
    <!-- page content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="card card-blue">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('user.mahasiswa.update', $user->id) }}" method="POST"
                                data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="number" min="0" class="form-control" name="noId"
                                                placeholder="Enter ..." value="{{ $user->noId }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter ..."
                                                value="{{ $user->username }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="address" placeholder="Enter ..."
                                                value="{{ $user->address }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter ..."
                                                value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password" placeholder="Enter ..."
                                                value="{{ $user->password }}">
                                        </div>
                                        <div class="form-group">
                                            <label>No. Hp</label>
                                            <input type="number" min="0" class="form-control" name="tlp"
                                                placeholder="Enter ..." value="{{ $user->tlp }}">
                                        </div>
                                    </div>


                                </div>
                                <a class="btn btn-danger" type="button"
                                    href="{{ route('user.mahasiswa.index') }}">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
