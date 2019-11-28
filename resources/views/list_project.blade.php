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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách dự án
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <a href="create_project.html" class="btn btn-success" style="margin: 10px 0 ;">Tạo dự án</a>
              <table id="table_projects" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên dự án</th>
                  <th>Deadline</th>
                  <th>Người chịu trách nhiệm</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dự án cung cấp thuốc thú y cho tỉnh Hà Nam</td>
                        <td>12/12/2019</td>
                        <td>Lã Mạnh Cường</td>
                        <td>Đang thực hiện</td>
                        <td>
                            <button class="btn btn-warning"><a href="detail_project.html">Chi tiết</a></button>
                            <button class="btn btn-info">Sửa</button>
                            <button class="btn btn-danger">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dự án cung cấp thuốc thú y cho tỉnh Hà Nam</td>
                        <td>12/12/2019</td>
                        <td>Lã Mạnh Cường</td>
                        <td>Đang thực hiện</td>
                        <td>
                            <button class="btn btn-warning"><a href="detail_project.html">Chi tiết</a></button>
                            <button class="btn btn-info">Sửa</button>
                            <button class="btn btn-danger">Xóa</button>
                        </td>
                    </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

@endsection

@push('js')
<script>

    function formatDate(date){
      var dd = String(date.getDate()).padStart(2, '0');
      var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = date.getFullYear();
    
      date = mm + '/' + dd + '/' + yyyy;
      return date;
    }
    
    
    // Đổ dữ liệu ra bảng project
      $.ajax({
                  url : "http://3.1.20.54/v1/projects", // link API
                  type : "get", // Phương thức POST
                  success : function (result){ // result là kết quả trả về khi gọi đến API
                    console.log(result.results); // thẻ này để xem định dạng kết quả api được trả về 
                    let list_project = result.results;
                    for (let index = 0; index < result.count ; index++) {
                      // table_projects là id của thẻ table
                      $('#table_projects tbody').append(` 
                      <tr>
                            <td>${index }</td>
                            <td>${list_project[index].name }</td> // ví dụ (1) 
                            <td>${formatDate(new Date(list_project[index].deadline))}</td>
                            <td>${list_project[index].created_by }</td>
                            <td>${list_project[index].status }</td>
                            <td>
                                <button class="btn btn-warning"><a href="http://3.1.20.54/v1/projects/${list_project[index].id}">Chi tiết</a></button>
                                <button class="btn btn-info">Sửa</button>
                                <button class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>`); // thay từ chỗ thẻ <tr> đến hết </tr> bằng đoạn code chứa <tr> đến </tr> với nội dung tương ứng trong thẻ table bên trên. Chú ý dữ liệu được đổ ra theo cú pháp ${} như ví dụ (1)
                  }
                      
                    }
                   
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
@endpush


