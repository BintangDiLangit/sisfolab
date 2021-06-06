<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presensi Pengunjung</title>
    <link rel="icon" href="{{ asset('../../admin/logo/logo.png') }}" type="image/png type">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet"
        href="{{ asset('../../admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}') }}">

    <link href="{{ asset('../../formLanding/vendor/mdi-font/css/material-design-iconic-font.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('../../formLanding/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('../../formLanding/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('../../formLanding/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('../../formLanding/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body class="">
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Lengkapi Form Berikut</h2>
                    <form action="{{ route('visitor.store') }}" method="POST" novalidate>
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

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Nomor Identitas"
                                        name="identityNum">
                                </div>
                            </div>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Nama Lengkap" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" style="margin-right: 7px;"
                                type="submit">Submit</button>
                            <a href="/" class="btn btn--radius btn--red">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('../../admin/plugins/select2/js/select2.full.min.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
