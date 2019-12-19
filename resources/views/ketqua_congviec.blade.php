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
@php

@endphp
<section class="content-header">
  <h1>
    Chi tiết công việc {{ $recurrent_task->name ?? ''}}
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản lý công việc</a></li>
    <li class="active">Kết quả công việc</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- /.row -->
  <div class="box-body">  
    <div class="row">

      <!-- /.col -->
      <div class="col-xs-12">
        <div class="box box-primary">

          <div class="box-header with-border">
            <!-- Bar chart -->

            <div class="col-md-4">Tên công việc:</div>
            <div class="col-md-8">{{ $recurrent_task->name ?? ''}}</div>
            <div class="col-md-4">Mô tả công việc:</div>
            <div class="col-md-8">{{ $recurrent_task->description ?? ''}}</div>
            <div class="col-md-4">Phòng ban thực hiện</div>
            <div class="col-md-8">{{ $recurrent_task->department->name ?? ''}}</div>
            <div class="col-md-4">Phòng ban phối hợp thực hiện</div>
            <div class="col-md-8">
              <?php
                if(count($recurrent_task->coDepartments) !== 0) {
                  foreach ($recurrent_task->coDepartments as $coDepartment) {
                    echo ($coDepartment->name . ', ');
                  }
                } else {
                  echo ('Không có');
                }
              ?>
            </div>
            <div class="col-md-4">Người tạo:</div>
            <div class="col-md-8"> {{ $recurrent_task->creator->name ?? '' }}</div>
            <div class="col-md-4">Người nhận xét:</div>
            <div class="col-md-8"> {{ $recurrent_task->reviewer->name ?? '' }}</div>
            <div class="col-md-4">Nhãn công việc:</div>
            <div class="col-md-8">
              <?php
                if(count($recurrent_task->labels) !== 0) {
                  foreach ($recurrent_task->labels as $label) {
                    echo ($label->name . ', ');
                  }
                } else {
                  echo ('Không có');
                }
              ?>
            </div>
            <div class="col-md-4">Ngày bắt đầu:</div>
            <div class="col-md-8">{{ date_format(date_create($recurrent_task->start),"Y/m/d") ?? ''}}</div>
            <div class="col-md-4">Deadline:</div>
            <div class="col-md-8">{{ date_format(date_create($recurrent_task->due),"Y/m/d") ?? ''}}</div>
            <div class="col-md-4">Ngày hoàn thành:</div>
            <div class="col-md-8">
              <?php
                if(isset($recurrent_task->finish)) {
                  echo(date_format(date_create($recurrent_task->finish),"Y/m/d"));
                } else {
                  echo ('Chưa hoàn thành');
                }
              ?>
            </div>
            <div class="col-md-4">Mức độ hoàn thành công việc:</div>
            <div class="col-md-8">{{ $recurrent_task->percentComplete}}%</div>
            <div class="col-md-4">Trạng thái:</div>
            <div class="col-md-8">{{ $recurrent_task->status }}</div>
            <div class="col-md-4">Nhận xét:</div>
            <div class="col-md-8">
              <?php
                if(isset($recurrent_task->comment)) {
                  echo($recurrent_task->comment);
                } else {
                  echo ('Chưa có nhận xét');
                }
              ?>
            </div>
            <!-- /.box -->
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <?php if ($recurrent_task->percentComplete != 100) { ?>
      <div class="row">
        <div class="col-xs-12">
          <form id="update_task"" action="{{ route('capnhatcongviec', $recurrent_task->_id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label>Cập nhật tiến độ:</label>
              <input type="text" class="form-control" id="percentComplete"  data-parsley-type="text" name="percentComplete">
            </div>
            <!-- /.box -->
            <div>
              <button type="submit" class="btn btn-block btn-success btn-comment">Cập nhật tiến độ</button>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-xs-12">
        <form id="create_task_form" action="{{ route('capnhatcongviec', $recurrent_task->_id)}}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label>Nhận xét:</label>
            <textarea class="form-control" rows="5" placeholder="Nhận xét ..." name="comment"></textarea>
          </div>
          <!-- /.box -->
          <div>
            <button type="submit" class="btn btn-block btn-success btn-comment">Nhận xét</button>
          </div>
        </form>
      </div>
      <!-- /.col -->
    </div>
  </div>
  <!-- /.row -->
</section>

@endsection

@push('js')
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
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<!-- page script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Page script -->
<script>
 $(function () {
   $('.btn-comment').on('click', function(e){
     e.preventDefault();
     Swal.fire({
       title: 'Bạn có muốn gửi nhận xét',
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Send'
     }).then((result) => {
       if (result.value) {
         Swal.fire(
           'Sended!',
           'Gửi nhận xét thành côngs!.',
           'success'
         )
         window.location="congviec_quytrinh.html";
       }
     })
   })
 });
 $(function () {
   $('#example1').DataTable()
   $('#example2').DataTable({
     'paging'      : true,
     'lengthChange': false,
     'searching'   : false,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : false
   })
 })
</script>
<!-- Page script -->
<script>
 $(function () {
   /*
    * Flot Interactive Chart
    * -----------------------
    */
   // We use an inline data source in the example, usually data would
   // be fetched from a server
   var data = [], totalPoints = 100

   function getRandomData() {

     if (data.length > 0)
       data = data.slice(1)

     // Do a random walk
     while (data.length < totalPoints) {

       var prev = data.length > 0 ? data[data.length - 1] : 50,
       y    = prev + Math.random() * 10 - 5

       if (y < 0) {
         y = 0
       } else if (y > 100) {
         y = 100
       }

       data.push(y)
     }

     // Zip the generated y values with the x values
     var res = []
     for (var i = 0; i < data.length; ++i) {
       res.push([i, data[i]])
     }

     return res
   }

   var interactive_plot = $.plot('#interactive', [getRandomData()], {
     grid  : {
       borderColor: '#f3f3f3',
       borderWidth: 1,
       tickColor  : '#f3f3f3'
     },
     series: {
       shadowSize: 0, // Drawing is faster without shadows
       color     : '#3c8dbc'
     },
     lines : {
       fill : true, //Converts the line chart to area chart
       color: '#3c8dbc'
     },
     yaxis : {
       min : 0,
       max : 100,
       show: true
     },
     xaxis : {
       show: true
     }
   })

   var updateInterval = 500 //Fetch data ever x milliseconds
   var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
   function update() {

     interactive_plot.setData([getRandomData()])

     // Since the axes don't change, we don't need to call plot.setupGrid()
     interactive_plot.draw()
     if (realtime === 'on')
       setTimeout(update, updateInterval)
   }

   //INITIALIZE REALTIME DATA FETCHING
   if (realtime === 'on') {
     update()
   }
   //REALTIME TOGGLE
   $('#realtime .btn').click(function () {
     if ($(this).data('toggle') === 'on') {
       realtime = 'on'
     }
     else {
       realtime = 'off'
     }
     update()
   })
   /*
    * END INTERACTIVE CHART
    */

   /*
    * LINE CHART
    * ----------
    */
   //LINE randomly generated data

   var sin = [], cos = []
   for (var i = 0; i < 14; i += 0.5) {
     sin.push([i, Math.sin(i)])
     cos.push([i, Math.cos(i)])
   }
   var line_data1 = {
     data : sin,
     color: '#3c8dbc'
   }
   var line_data2 = {
     data : cos,
     color: '#00c0ef'
   }
   $.plot('#line-chart', [line_data1, line_data2], {
     grid  : {
       hoverable  : true,
       borderColor: '#f3f3f3',
       borderWidth: 1,
       tickColor  : '#f3f3f3'
     },
     series: {
       shadowSize: 0,
       lines     : {
         show: true
       },
       points    : {
         show: true
       }
     },
     lines : {
       fill : false,
       color: ['#3c8dbc', '#f56954']
     },
     yaxis : {
       show: true
     },
     xaxis : {
       show: true
     }
   })
   //Initialize tooltip on hover
   $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
     position: 'absolute',
     display : 'none',
     opacity : 0.8
   }).appendTo('body')
   $('#line-chart').bind('plothover', function (event, pos, item) {

     if (item) {
       var x = item.datapoint[0].toFixed(2),
       y = item.datapoint[1].toFixed(2)

       $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
       .css({ top: item.pageY + 5, left: item.pageX + 5 })
       .fadeIn(200)
     } else {
       $('#line-chart-tooltip').hide()
     }

   })
   /* END LINE CHART */

   /*
    * FULL WIDTH STATIC AREA CHART
    * -----------------
    */
    var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
    [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
    [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
    $.plot('#area-chart', [areaData], {
     grid  : {
       borderWidth: 0
     },
     series: {
       shadowSize: 0, // Drawing is faster without shadows
       color     : '#00c0ef'
     },
     lines : {
       fill: true //Converts the line chart to area chart
     },
     yaxis : {
       show: false
     },
     xaxis : {
       show: false
     }
   })

    /* END AREA CHART */

   /*
    * BAR CHART
    * ---------
    */

    var bar_data = {
     data : [['January', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9]],
     color: '#3c8dbc'
   }
   $.plot('#bar-chart', [bar_data], {
     grid  : {
       borderWidth: 1,
       borderColor: '#f3f3f3',
       tickColor  : '#f3f3f3'
     },
     series: {
       bars: {
         show    : true,
         barWidth: 0.5,
         align   : 'center'
       }
     },
     xaxis : {
       mode      : 'categories',
       tickLength: 0
     }
   })
   /* END BAR CHART */

   /*
    * DONUT CHART
    * -----------
    */

    var donutData = [
    { label: 'Series2', data: 30, color: '#0101DF' },
    { label: 'Series3', data: 20, color: '#0B610B' },
    { label: 'Series1', data: 10, color: '#01DFD7' },
    { label: 'Series4', data: 40, color: '#DF3A01' }
    ]
    $.plot('#donut-chart', donutData, {
     series: {
       pie: {
         show       : true,
         radius     : 1,
         innerRadius: 0.5,
         label      : {
           show     : true,
           radius   : 2 / 3,
           formatter: labelFormatter,
           threshold: 0.1
         }

       }
     },
     legend: {
       show: false
     }
   })
   /*
    * END DONUT CHART
    */

  })

 /*
  * Custom Label formatter
  * ----------------------
  */
  function labelFormatter(label, series) {
   return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
   + label
   + '<br>'
   + Math.round(series.percent) + '%</div>'
 }
</script>
@endpush
