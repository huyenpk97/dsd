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
      Danh sách công việc theo quy trình
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Quản lý công việc</a></li>
      <li class="active">công việc thường xuyên</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- /.row -->

    <div class="row">
      <div class="col-md-6">

        <!-- /.box -->
        <!-- Donut chart -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>

            <h3 class="box-title">Biểu đồ công việc</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>

            </div>
          </div>
          <div class="box-body">
            <div id="donut-chart" style="height: 300px;"></div>
          </div>
          <!-- /.box-body-->
        </div>

      </div>
      <!-- /.col -->

      <div class="col-md-6">
       
        <div class="box-body pad table-responsive">

          <table class="table table-bordered text-center">
            <tr>
              <th></th>
              <th></th>
              <th></th>
            </tr>

            <tr>
              <td>
                <button type="button" class="btn btn-block btn-primary">10</button>
              </td>
              <td>
                Tổng công việc
              </td>

            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-block btn-success">5</button>
              </td>
              <td>
                Số công việc đã hoàn thành
              </td>

            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-block btn-info">4</button>
              </td>
              <td>
                Số công việc đang diễn ra
              </td>

            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-block btn-danger">1</button>
              </td>
              <td>
                Số công việc chậm tiến độ
              </td>
            </tr>
            <tr>
              <td><div class="form-group">
                <label>Tuần</label>
                <select class="form-control">
                  <option>Tuần 1</option> <option>Tuần 2</option> <option>Tuần 3</option> <option>Tuần 4</option> <option>Tuần 5</option> <option>Tuần 6</option> <option>Tuần 7</option> <option>Tuần 8</option> <option>Tuần 9</option> <option>Tuần 10</option> <option>Tuần 11</option> <option>Tuần 12</option> <option>Tuần 13</option> <option>Tuần 14</option> <option>Tuần 15</option> <option>Tuần 16</option> <option>Tuần 17</option> <option>Tuần 18</option> <option>Tuần 19</option> <option>Tuần 20</option> <option>Tuần 21</option> <option>Tuần 22</option> <option>Tuần 23</option> <option>Tuần 24</option> <option>Tuần 25</option> <option>Tuần 26</option> <option>Tuần 27</option> <option>Tuần 28/<option> <option>Tuần 29</option> <option>Tuần 30</option> <option>Tuần 31</option> <option>Tuần 32</option> <option>Tuần 33</option> <option>Tuần 34</option> <option>Tuần 35</option> <option>Tuần 36</option> <option>Tuần 37</option> <option>Tuần 38</option> <option>Tuần 39</option> <option>Tuần 40</option> <option>Tuần 41</option> <option>Tuần 42</option> <option>Tuần 43</option> <option>Tuần 44</option> <option>Tuần 45</option> <option>Tuần 46</option> <option>Tuần 47</option> <option>Tuần 48</option> <option>Tuần 49</option> <option>Tuần 50</option> <option>Tuần 51</option> <option>Tuần 52</option>
                 </select>
               </div></td>
               <td><div class="form-group">
                <label>Tháng</label>
                <select class="form-control">
                  <option>Tháng 1</option>
                  <option>Tháng 2</option>
                  <option>Tháng 3</option>
                  <option>Tháng 4</option>
                  <option>Tháng 5</option>
                  <option>Tháng 6</option>
                  <option>Tháng 7</option>
                  <option>Tháng 8</option>
                  <option>Tháng 9</option>
                  <option>Tháng 10</option>
                  <option>Tháng 11</option>
                  <option>Tháng 12</option>

                </select>
              </div></td>
              <td>
                  <div class="form-group">
                  <label>Năm</label>
                  <select class="form-control">
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                    <option>2015</option>
                  </select>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- /.row -->
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->
        <a href="taocongviec_quytrinh.blade.php"><button type="button" class="btn btn-block btn-success">Tạo công việc</button></a>
      </div>
      <!-- /.col -->
    </div>
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Bảng quản lý công việc</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên công việc</th>
                  <th>Tên quy trình</th>
                  <th>Người tạo</th>
                  <th>Phòng ban thực hiện</th>
                  <th>Deadline</th>
                  <th>Tiến độ</th>
                  <th>Kết quả</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Công việc
                  </td>
                  <td>Quy trình</td>
                  <td>NGuyễn A</td>
                  <td>Phòng hành chính</td>
                  <td>20/11/2019</td>
                  <td>35%</td>
                  <td><a href="ketqua_congviec.blade.php" class="btn btn-primary">Kết quả</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Bán thuốc</td>
                  <td>Maketting</td>
                  <td>Nguyễn Chí Thanh</td>
                  <td>Phòng hành chính nhân sự</td>
                  <td>20/10/2019</td>
                  <td>65%</td>
                  <td><a href="ketqua_congviec.blade.php" class="btn btn-primary">Kết quả</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Bán thuốc</td>
                  <td>Maketting</td>
                  <td>Nguyễn Chí Thanh</td>
                  <td>Phòng hành chính nhân sự</td>
                  <td>20/10/2019</td>
                  <td>65%</td>
                  <td><a href="ketqua_congviec.blade.php" class="btn btn-primary">Kết quả</a></td>
                </tr>
                <tr>
                  <td>4  </td>
                  <td>Bán thuốc</td>
                  <td>Maketting</td>
                  <td>Nguyễn Chí Thanh</td>
                  <td>Phòng hành chính nhân sự</td>
                  <td>20/10/2019</td>
                  <td>65%</td>
                  <td><a href="ketqua_congviec.blade.php" class="btn btn-primary">Kết quả</a></td>
                </tr>

                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên công việc</th>
                    <th>Tên quy trình</th>
                    <th>Người tạo</th>
                    <th>Phòng ban thực hiện</th>
                    <th>Deadline</th>
                    <th>Tiến độ</th>
                    <th>Kết quả</th>
                  </tr>
                </tfoot>
              </table>
          </div>
            <!-- /.box-body -->
        </div>
        <!-- /.col -->
      </div>
    </div>
      <!-- /.row -->
  </section>

@endsection

@push('js')
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
 <!-- page script -->
 <script>
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
     { label: '', data: 50, color: '#0B610B' },
     { label: '', data: 40, color: '#01DFD7' },
     { label: '', data: 10, color: '#DF3A01' }
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
