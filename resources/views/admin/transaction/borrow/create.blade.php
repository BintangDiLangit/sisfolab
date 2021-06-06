@extends('layouts.master')
@section('title')
    Tambah Peminjaman
@endsection
@section('content')


    <section class="content">
        <div class="container-fluid">

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Tambah Peminjaman</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tambah Peminjaman</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="{{ route('borrow.store') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">No. Identitas<span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control select2" name="noId" id="noId">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->noId . ' - ' . $user->username }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                        </tr>
                                        <tr>
                                            <td><select class="form-control select2" name="moreFields[0][material]">
                                                    <option selected="selected">None</option>
                                                    @foreach ($materials as $material)
                                                        <option value="{{ $material->id }}">
                                                            {{ $material->name . '(Stock: ' . $material->stock . ')' }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            <td><input type="number" min=1 name="moreFields[0][jumlah]"
                                                    placeholder="Enter Name" class="form-control" />
                                            </td>
                                            <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add
                                                    More</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Keperluan<span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" data-validate-length-range="6"
                                                data-validate-words="2" name="need" required="required" />
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Digunakan
                                            di<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" data-validate-length-range="6"
                                                data-validate-words="2" name="usedIn" required="required" />
                                        </div>
                                    </div>
                                    <div class="ln_solid">
                                        <div class="form-group">
                                            <div class="col-md-6 offset-md-3 text-right">
                                                <a href="{{ route('borrow.index') }}" class="btn btn-danger btn-xs"><i
                                                        class="fa fa-mail-reply"></i>
                                                    Back
                                                </a>
                                                <button type='submit' class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('js')
    <script type="text/javascript">
        var i = 0;
        optionText = 'Ultimate';
        optionValue = 'ultimate';
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                `
                                                    <tr>
                                                        <td><select class="form-control select2" name="moreFields[` +
                i +
                `][material]">
                        <option selected="selected">None</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}">
                                {{ $material->name . '(Stock: ' . $material->stock . ')' }}
                            </option>
                        @endforeach
                                                    </select></td>
                                                     <td><input type="number" min=1 name="moreFields[` +
                i +
                `][jumlah]" placeholder="Enter Name"
                                                    class="form-control" />
                                                    </td>
                                                <td>
                                            <button type="button" class="btn btn-danger remove-tr">Remove</button>
                                        </td>
                                        </tr>`
            );
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    </script>
@endpush
