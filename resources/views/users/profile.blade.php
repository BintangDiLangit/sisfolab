@extends('users.layouts.master')
@section('titile')
    Profile
@endsection
@section('nbr')
    Profile
@endsection
@section('sidebar')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('index.pinjam') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Riwayat Peminjaman</p>
                </a>
            </li>
        </ul>
    </div>

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        @php
                            $tes = Auth::user()->id;
                        @endphp

                        <form action="{{ route('profile.update', $tes) }}" method="POST" data-parsley-validate
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input name="username" type="text" class="form-control"
                                            value="{{ Auth::user()->username }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input name="email" type="email" class="form-control"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fist Name</label>
                                        <input name="firstname" type="text" class="form-control"
                                            value="{{ Auth::user()->firstname }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input name="lastname" type="text" class="form-control"
                                            value="{{ Auth::user()->lastname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input name="address" type="text" class="form-control"
                                            value="{{ Auth::user()->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Telephon</label>
                                        <input type="number" class="form-control" value="{{ Auth::user()->tlp }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @if (Auth::user()->jeniskelamin != null)
                                            <label class="bmd-label-floating">Gender | Selected
                                                ({{ Auth::user()->jeniskelamin }})</label>
                                        @else
                                            <label class="bmd-label-floating">Gender | Not Yet Selected</label>
                                        @endif

                                        <select id="gender" name="jeniskelamin" class="form-control">
                                            <option <?= (Auth::user()->jeniskelamin == 'Laki-laki') ? "selected" : "" ?> value="Laki-laki">Laki-laki</option>
                                            <option <?= (Auth::user()->jeniskelamin == 'Perempuan') ? "selected" : "" ?> value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if (Auth::user()->avatar != null)
                                            <label class="bmd-label-floating">Profile Picture | Selected
                                                ({{ Auth::user()->avatar }})</label>
                                        @else
                                            <label class="bmd-label-floating">Profile Picture | Not Yet Selected</label>
                                        @endif
                                    </div>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
