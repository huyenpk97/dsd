<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Lã Mạnh Cường</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Thống kê công việc</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('thongke_congviec')}}" ><i class="fa fa-circle-o"></i>Thống kê công việc</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Công việc thường xuyên</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{ route('ds_congviec_thuong_xuyen_cty') }}"><i class="fa fa-circle-o"></i>Ds công việc thường xuyên</a></li>
                <li><a href="{{ route('taocongviec')}}"><i class="fa fa-circle-o"></i>Tạo công việc</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Quản lý KPI</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{ route('thongke_KPI')}}"><i class="fa fa-circle-o"></i>Thống kê KPI</a></li>
                    <li><a href="{{ route('dsKPI_nhanvien')}}"><i class="fa fa-circle-o"></i>KPI nhân viên</a></li>
                    <li><a href="{{ route('dsKPI_phongban')}}"><i class="fa fa-circle-o"></i>KPI phòng ban</a></li>
                    <li><a href="{{ route('chitiet_KPIduan')}}"><i class="fa fa-circle-o"></i>KPI dự án</a></li>
                    <li><a href="{{ route('chitiet_KPIduanNV')}}"><i class="fa fa-circle-o"></i>Chi tiết KPI nhân viên trong dự án</a></li>
                    <li><a href="{{ route('cauhinh_KPI')}}"><i class="fa fa-circle-o"></i>Cấu hình KPI</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Công việc theo quy trình</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('ds_quytrinh')}}"><i class="fa fa-circle-o"></i>Ds quy trình</a></li>
                    <li><a href="{{ route('tao_quytrinh')}}"><i class="fa fa-circle-o"></i>Tạo quy trình</a></li>
                    <li><a href="{{ route('congviec_quytrinh')}}"><i class="fa fa-circle-o"></i>Ds công việc theo quy trình</a></li>
                    <li><a href="{{ route('taocongviec_quytrinh')}}"><i class="fa fa-circle-o"></i>Tạo công việc</a></li>
                   
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Công việc theo dự án</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('list_project')}}"><i class="fa fa-circle-o"></i>Ds dự án</a></li>
                    <li><a href="{{ route('create_project')}}"><i class="fa fa-circle-o"></i>Tạo dự án</a></li>
          
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Quản lý thông báo</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('create_notification')}}"><i class="fa fa-circle-o"></i>Gửi thông báo</a></li>
                    <li><a href="{{ route('list_notification')}}"><i class="fa fa-circle-o"></i> Ds thông báo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Quản lý báo cáo</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('taobaocao')}}"><i class="fa fa-circle-o"></i>Tạo báo cáo</a></li>
                    <li><a href="{{ route('ds_baocao')}}"><i class="fa fa-circle-o"></i>Ds báo cáo</a></li>
                    <li><a href="{{ route('pheduyet_baocao')}}"><i class="fa fa-circle-o"></i> Phê duyệt báo cáo</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
