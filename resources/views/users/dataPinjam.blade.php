@extends('users.layouts.master')
@section('titile')
    Riwayat Peminjaman
@endsection
@section('nbr')
    Riwayat Peminjaman
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
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index.pinjam') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Riwayat Peminjaman</p>
                </a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Riwayat Peminjaman</h4>
                        <p class="card-category">Peminjaman di Lab Laboratorium Keperawatan</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Need</th>
                                        <th>Used In</th>
                                        <th>Status</th>
                                        <th>Material</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrows as $key => $borrow)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $borrow->need }}
                                            </td>
                                            <td>{{ $borrow->usedIn }}</td>
                                            <td>
                                                @if ($borrow->status == 1)
                                                    Masih dipinjam
                                                @else
                                                    Sudah dikembalikan
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($borrow->materials as $material)
                                                    {{ $material->name . '(' . $material->pivot->borrowAmount . ')' }}
                                                    <br>
                                                @endforeach
                                            </td>
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
@endsection
