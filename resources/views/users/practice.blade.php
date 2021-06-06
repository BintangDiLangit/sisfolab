<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presensi Praktikum</title>
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
                    <form action="{{ route('practice.store') }}" method="POST" novalidate>
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
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select class="form-control select2" name="matkul_id">
                                    <option value="">Pilih Mata Kuliah</option>
                                    @foreach ($matkuls as $matkul)
                                        <option value="{{ $matkul->id }}">
                                            {{ $matkul->namaMatkul }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select class="form-control select2" name="lab_id">
                                    <option value="">Pilih Lab</option>
                                    @foreach ($labs as $lab)
                                        <option value="{{ $lab->id }}">
                                            {{ $lab->namaLab }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select class="form-control select2" name="namaAnggota">
                                    <option value="">Pilih Nama Praktikkan</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->noId . ' - ' . $user->username }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select class="form-control select2" name="lecturerName">
                                    <option value="">Pilih Nama Dosen / Tenaga Pengajar</option>
                                    @foreach ($tkp as $tkp)
                                        <option value="{{ $tkp->username }}">
                                            {{ $tkp->noId . ' - ' . $tkp->username }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="select-dropdown"></div>
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

    <!-- Page specific script -->

    @stack('js')

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })

    </script>
    @include('sweetalert::alert')
</body>

</html>
