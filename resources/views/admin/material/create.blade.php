@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h2>Add Material</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('material.store') }}" method="POST">
                @csrf
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
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><select class="form-control" name="moreFields[0][kategori]">
                                <option value="tool">Alat</option>
                                <option value="stuff">Bahan</option>
                            </select></td>
                        <td><input type="text" name="moreFields[0][name]" placeholder="Enter Name" class="form-control" />
                        </td>
                        <td><input type="number" min="1" name="moreFields[0][stock]" placeholder="Enter Stock"
                                class="form-control" />
                        </td>
                        <td><textarea class="form-control" name="moreFields[0][desc]" cols="25" rows="5"
                                placeholder="Enter Desc"></textarea>
                        </td>
                        <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        var i = 0;
        optionText = 'Ultimate';
        optionValue = 'ultimate';
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append(`
                                        <tr>
                                            <td>
                                                <select class="form-control" name="moreFields[` + i + `][kategori]">
                                                    <option value="tool">Alat</option>
                                                    <option value="stuff">Bahan</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="moreFields[` + i + `][name]" placeholder="Enter title" class="form-control" />
                                            </td>
                                            <td>
                                                <input type="number" min="1" name="moreFields[` + i + `][stock]" placeholder="Enter title" class="form-control" />
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="moreFields[` + i + `][desc]" cols="25" rows="5" placeholder="Enter Desc"></textarea>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove-tr">Remove</button>
                                            </td>
                                        </tr>`);
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    </script>
@endpush
