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
            <li><a href="#">KPI dự án</a></li>

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
                <form action="{{ route('dsKPI_du_an')}}" method="GET" role="form" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <label>Năm</label>
                        <input type="number" class="form-control" name= "year" min="2000" max="2099" step="1" value="{{ $_GET['year'] ?? 2019}}" />
          
                    </div>
          
                    <button type="submit" class="btn btn-primary">Lọc <i class="fa fa-refresh"></i></button>
                </form>

                @if($isEmpty )
                    <h3 style="color: red;">{{ $list_kpi_projects->result}}</h3>
                @endif
            </div>
        </div>
        @if(!$isEmpty )
        <div class="box">
            <div class="box-body ">
                <canvas id="canvas" width="100" height="25" style="height: 500 !important;"></canvas>
            </div>
        </div>
        @endif
        <!-- /.row -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bảng thống kê chỉ tiêu kpi dự án</h3>
                <form action="{{ route('dsKPI_du_an')}}" method="GET" role="form" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <label></label>
                        <select name="max_min" id="" class="form-control">
                            <option value="max" <?php echo (old('max_min') == "max" ? "selected" : '' )?>>Dự án có KPI cao nhất</option>
                            <option value="min"<?php echo( old('max_min') == "min" ? "selected" : '') ?>>Dự án có KPI thấp nhất</option>
                        </select>
          
                    </div>
          
                    <button type="submit" class="btn btn-primary">Lọc <i class="fa fa-refresh"></i></button>
                </form>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th >STT</th>
                        <th >Tên dự án</th>
                        <th >KPI tiêu chuẩn</th>
                        <th>KPI đạt được</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $index = 1;
                        $percent = '';
                        $name_projects = '';

                    ?>
                    @if(!$isEmpty )
                        @foreach($list_kpi_projects as $kpi_project)
                        <?php $percent .= '' . floor(($kpi_project->kpi/ $kpi_project->kpi_standard)*100) . ',';
                            $name_projects .= '"' . $kpi_project->name . '",';
                        ?>
                            <tr>
                                <td>{{ $index++}}</td>
                                <td>{{ $kpi_project->name }}</td>
                                <td>{{ $kpi_project->kpi_standard }}</td>
                                <td>{{ $kpi_project->kpi }}</td>
                                <td><a href="{{ route('chitiet_KPIduan', $kpi_project->id_project)}}"><button class="btn btn-default">Chi tiết</button></a></td>
                            </tr>
                        @endforeach
                        <?php 
                            
                            rtrim($percent, ', ');
                            rtrim($name_projects ,', ');


                        ?>
                    @endif

                   
                    </tbody>

                </table>
            </div>

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
			labels: [<?php echo $name_projects ;?>],
			datasets: [{
				type: 'bar',
				label: 'Phần trăm hoàn thành KPI dự án',
				backgroundColor: window.chartColors.green,
				data: [<?php echo $percent; ?>],
				borderColor: 'white',
				borderWidth: 2
			}
  ]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
            ctx.height = 500;
                    var mixedChart = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: {
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                intersect: true
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true,
                                        min: 0,
                                        max: 100    
                                    }
                                }]
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

