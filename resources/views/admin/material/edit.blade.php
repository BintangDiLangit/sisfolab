@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h2>Edit Material</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('material.update', $material->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                    </tr>
                    <tr>
                        <td><select class="form-control" name="kategori">
                                <option value="tool">Alat</option>
                                <option value="stuff">Bahan</option>
                            </select></td>
                        <td><input type="text" name="name" placeholder="Enter Name" class="form-control" required
                                value="{{ $material->name }}" />
                        </td>
                        <td><input type="number" min="1" name="stock" placeholder="Enter Stock" class="form-control"
                                required value="{{ $material->stock }}" />
                        </td>
                        <td><textarea class="form-control" name="desc" cols="25" rows="5" placeholder="Enter Desc"
                                required>{{ $material->desc }}</textarea>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('material.index') }}" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>
@endsection
