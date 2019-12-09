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
   <!-- SELECT2 EXAMPLE -->
   <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title" style="margin: 20px 0;">Xếp hạng KPI theo nhân viên</h3>
      <form action="" method="POST" role="form" class="form-inline">
          <div class="form-group">
              <label>Tiêu chí</label>
              <select class="form-control">
              <option>Đạt doanh số</option>
              <option>Nhân viên thực hiện đúng nội quy</option>
              <option>Hoàn thành công việc đúng hạn</option>
              </select>
          </div>
          <div class="form-group">
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
          </div>
          <div class="form-group">
              <label>Quý</label>
              <select class="form-control">
                <option>Tuần 1</option>
                <option>Tuần 2</option>
                <option>Tuần 3</option>
                <option>Tuần 4</option>
                <option>Tuần 5</option>
                </select>
          </div>
          <div class="form-group">
              <label>Năm</label>
              <input type="number" class="form-control" min="2000" max="2099" step="1" value="2019" />

          </div>

          <button type="submit" class="btn btn-primary">Lọc <i class="fa fa-refresh"></i></button>
      </form>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <canvas id="canvas" height="105"></canvas>
    </div>
  </div>

  <div class="box box-default">
    <div class="box-header with-border">
        Xếp Hạng Phòng Ban và nhân viên có KPI cao nhất
    </div>
    <!-- /.box-header -->
    <div class="box-body row">
        <div class="table-responsive col-md-6">  
            <h3>Xếp hạng những nhân viên có KPI cao </h3>           
            <table class="table table-bordered ">
                <thead>
                    <tr>
                      <th>Xếp hạng</th>
                      <th>Tên nhân viên</th>
                      <th>KPI</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Lã Mạnh Cường</td>
                          <td>Hành chính nhân sự</td>
                          <td>90</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Nguyễn Chí Thanh</td>
                          <td>Bộ phận sản xuất</td>
                          <td>85</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Nguyễn Duy Kỳ</td>
                          <td>Bộ phận nghiên cứu và phát triển </td>
                          <td>80</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Trịnh Duy Hưng</td>
                          <td>Bộ phận đảm bảo chất lươngj</td>
                          <td>75</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Kerlor Senglao</td>
                          <td>Bộ phận bán hàng</td>
                          <td>65</td>
                        </tr>
                  </tbody>
            </table>
          </div>
          <div class="table-responsive col-md-6">  
              <h3>Xếp hạng những nhân viên có KPI có thấp nhất </h3>           
              <table class="table table-bordered ">
                  <thead>
                      <tr>
                        <th>Xếp hạng</th>
                        <th>Tên nhân viên</th>
                        <th>Phòng ban</th>
                        <th>KPI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Lã Mạnh Cường</td>
                        <td>Hành chính nhân sự</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Nguyễn Chí Thanh</td>
                        <td>Bộ phận sản xuất</td>
                        <td>20</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nguyễn Duy Kỳ</td>
                        <td>Bộ phận nghiên cứu và phát triển </td>
                        <td>25</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Trịnh Duy Hưng</td>
                        <td>Bộ phận đảm bảo chất lươngj</td>
                        <td>35</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Kerlor Senglao</td>
                        <td>Bộ phận bán hàng</td>
                        <td>45</td>
                      </tr>
                    </tbody>
              </table>
          </div>
    </div>
  </div>

@endsection

@push('js')
<!-- FLOT CHARTS -->
<script src="{{asset('bower_components/Flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('bower_components/Flot/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('bower_components/Flot/jquery.flot.pie.js')}}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{asset('bower_components/Flot/jquery.flot.categories.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- ChartJS -->
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
			labels: ["Office & HR", 'Production', 'Accounting', 'Sales', 'Stock', 'R&D', 'QoC'],
			datasets: [{
				type: 'line',
				label: 'KPI của công ty',
				borderColor: window.chartColors.blue,
				borderWidth: 2,
				data: [
				70,
				70,
				70,
				70,
				70,
				70,
				70
				]
			}, {
				type: 'bar',
				label: 'KPI từng phòng ban',
				backgroundColor: window.chartColors.red,
				data: [
				80,
				70,
				69,
				75,
				95,
				45,
				67
				],
				borderColor: 'white',
				borderWidth: 2
			}
  ]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
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
@endpush