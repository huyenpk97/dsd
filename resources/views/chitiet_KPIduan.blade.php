@extends('layout')
@section('title')
    Danh sách project
@endsection
@push('header')
    <link rel="stylesheet" href="{{  asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{  asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{  asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{  asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{  asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{  asset('plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{  asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{  asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{  asset('bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{  asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{  asset('dist/css/skins/_all-skins.min.css') }}">
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')

    <section class="content-header">
        <h1>
            KPI theo dự án
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">KPI phòng ban</a></li>

            <li class="active">Chi tiết KPI dự án</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Lọc</h3>
            </div>
            <div class="box-header with-border">
            <form action="{{ route('chitiet_KPIduan', $id)}}" method="GET" role="form" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <label>Năm</label>
                        <input type="number" class="form-control" name= "year" min="2000" max="2099" step="1" value="2019" />
                    </div>
          
                    <button type="submit" class="btn btn-primary">Lọc <i class="fa fa-refresh"></i></button>
                </form>
            </div>
        </div>
        <div class="box">
            <div class="box-body ">
                <canvas id="canvas" width="100" height="25" style="height: 500 !important;"></canvas>
            </div>
        </div>
        <!-- /.row -->
        <div class="box">
            <form action="" method="post">
                <div class="box-header">
                    <h3 class="box-title">Bảng thống kê kpi dự án</h3>
                    <button class="btn btn-primary" style="float: right;">Cập nhật</button>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 40px">STT</th>
                            <th style="width: 80px">Mã KPI</th>
                            <th>Tên tiêu chí</th>
                            <th style="width: 80px">Chỉ tiêu</th>
                            <th style="width: 80px">Kết quả đạt được</th>
                            <th style="width: 80px">Trọng số KPI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>KPI01</td>
                            <td>Tiến độ dự án</td>
                            <td>55</td>
                        <td style="font-weight: bold"><input type="number" class="form-control" name="" id="" disabled value="31"></td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>KPI02</td>
                            <td>Chất lượng dự án</td>
                            <td>55</td>
                        <td style="font-weight: bold"><input type="number" class="form-control" name="" id="" disabled value="31"></td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>KPI03</td>
                            <td>Yếu tố kỹ thuật</td>
                            <td>55</td>
                        <td style="font-weight: bold"><input type="number" class="form-control" name="" id="" disabled value="31"></td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>KPI04</td>
                            <td>Quy mô mức độ dự án</td>
                            <td>55</td>
                            <td style="font-weight: bold"><input type="number" class="form-control" name="" id="" disabled value="31"></td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>KPI05</td>
                            <td>Đánh giá doanh thu</td>
                            <td>55</td> 
                        <td style="font-weight: bold" class="form-inline"><input type="number" class="form-control" name="" id=""  value="31"></td>
                            <td>35</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </form>

        </div>


    </section>

@endsection

@push('js')
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
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

            
    window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
  };
  var chartData = {
			labels: ['Đạt doanh số', 'Di đúng giờ', 'Sản lượng đạt 2tr sp', 'Số lượng sản phẩm lỗi ít', 'Hài lòng từ khách hàng', 'R&D', 'QoC'],
			datasets: [{
				type: 'line',
				label: 'Tiêu chí KPI của công ty',
				borderColor: window.chartColors.blue,
				borderWidth: 2,
				data: [
				80,
				69,
				70,
			  75,
				90,
				45,
				78
				]
			}, {
				type: 'bar',
				label: 'KPI từng tiêu chí dự án',
				backgroundColor: window.chartColors.red,
				data: [
				80,
				75,
				69,
				75,
				95,
				10,
				67
				],
				borderColor: 'white',
				borderWidth: 2
			}
  ]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
      ctx.height = 500;
      console.log(ctx);
			var mixedChart = new Chart(ctx, {
				type: 'bar',
				data: chartData,
				options: {
					responsive: true,
					tooltips: {
						mode: 'index',
						intersect: true
					}
				}
			});
		};
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

