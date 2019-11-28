@extends('layout')
@section('title')
    Danh sách project
    @endsection
    @push('header')
    {{-- <link rel="stylesheet" href="{{ asset('css/format_managements/index.css') }}"> --}}
    @endpush
    @push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
    @endpush
    @section('content')
        <section class="content-header">
            <h1>
                Danh sách báo cáo
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Báo cáo</a></li>

                <li class="active">Danh sách báo cáo</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- /.row -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách báo cáo cần phê duyệt</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Nhân viên</th>
                            <th>Ghi chú</th>
                            <th>Tình trạng</th>
                            <th>Báo cáo</th>
                            <th style="width:200px">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Báo cáo tính lương 1</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 10</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td><a href="{{  route('pheduyet_baocao') }}">
                                    <button class=" btn btn-primary btn-warning">Phê duyệt</button>
                                </a>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Báo cáo tính lương 2</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 8</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td><a href="{{  route('pheduyet_baocao') }}">
                                    <button class=" btn btn-primary btn-warning">Phê duyệt</button>
                                </a>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        <tr>
                            <td>3</td>
                            <td>Báo cáo tính lương 3</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 9</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td><a href="{{  route('pheduyet_baocao') }}">
                                    <button class=" btn btn-primary btn-warning">Phê duyệt</button>
                                </a>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Báo cáo tính lương 5</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 12</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td><a href="{{  route('pheduyet_baocao') }}">
                                    <button class=" btn btn-primary btn-warning">Phê duyệt</button>
                                </a>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Báo cáo tính lương 5</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 11</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td><a href="{{  route('pheduyet_baocao') }}">
                                    <button class=" btn btn-primary btn-warning">Phê duyệt</button>
                                </a>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        </tr>
                        </tbody>

                    </table>
                </div>

            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách báo cáo đã phê duyệt</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Nhân viên</th>
                            <th>Ghi chú</th>
                            <th>Tình trạng</th>
                            <th>Báo cáo</th>
                            <th style="width:100px">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Báo cáo tính lương 1</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 10</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Báo cáo tính lương 2</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 8</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        <tr>
                            <td>3</td>
                            <td>Báo cáo tính lương 3</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 9</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Báo cáo tính lương 5</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 12</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Báo cáo tính lương 5</td>
                            <td>Lã Mạnh Cường</td>
                            <td>Lấy danh sách thưởng tháng 11</td>
                            <td>35%</td>
                            <td><a href="chitiet_KPIduan.blade.php">Báo cáo</a></td>
                            <td>
                                <a href="deletearea.php?id=">
                                    <button class=" btn btn-success">Chi tiết</button>
                                </a></td>
                        </tr>
                        </tbody>

                    </table>
                </div>

            </div>

        </section>
        <!-- /.content -->

    @endsection

    @push('js')
        <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
        <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <!-- bootstrap datepicker -->
        <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <!-- bootstrap color picker -->
        <script src="{{ asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <!-- bootstrap time picker -->
        <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <!-- datatable -->
        <!-- iCheck 1.0.1 -->
        <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>

        <!-- FLOT CHARTS -->
        <script src="{{ asset('bower_components/Flot/jquery.flot.js') }}"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="{{ asset('bower_components/Flot/jquery.flot.resize.js') }}"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="{{ asset('bower_components/Flot/jquery.flot.pie.js') }}"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="{{ asset('bower_components/Flot/jquery.flot.categories.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    
        <script>
            $(function () {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })
            })
        </script>
        <!-- Page script -->
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
                //Money Euro
                $('[data-mask]').inputmask()

                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {format: 'MM/DD/YYYY hh:mm A'}
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                    {
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function (start, end) {
                        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    }
                )

                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                })

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                })
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                })
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                })

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                })
            })
        </script>
    @endpush
