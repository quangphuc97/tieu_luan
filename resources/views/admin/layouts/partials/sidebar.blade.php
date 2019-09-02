<aside class="main-sidebar">
  <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Danh mục</li>
        {{--<li class="treeview {{ Request::is('danhsachsanpham*') ? 'active menu-open' : '' }}">--}}
          {{--<a href="#"><i class="fa fa-edit"></i> <span>Quản lý nông sản</span>--}}
            {{--<span class="pull-right-container">--}}
                {{--<i class="fa fa-angle-left pull-right"></i>--}}
              {{--</span>--}}
          {{--</a>--}}
          {{--<ul class="treeview-menu" style="display: {{ Request::is('danhsachsanpham*') ? 'block' : '' }};">--}}
            {{--<li class="{{ Request::is('danhsachloai') ? 'active' : '' }}"><a href="{{ route('danhsachloai.index') }}"><i class="fa fa-circle-o"></i>Loại nông sản</a></li>--}}
            {{--<li class="{{ Request::is('danhsachsanpham') ? 'active' : '' }}"><a href="{{ route('danhsachsanpham.index') }}"><i class="fa fa-circle-o"></i>Nông sản</a></li>--}}
          {{--</ul>--}}
        {{--</li>--}}

      {{--<li class="{{ Request::is('danhsachtaikhoan') ? 'active' : '' }}"><a href="{{ route('danhsachtaikhoan.index') }}"><i class="fa fa-user"></i>Quản lý người dùng</a></li>--}}
      {{--<li class="{{Request::is('danhsachtin')?'active':''}}"><a href="{{ route('danhsachtin.index') }}"><i class="fa fa-tasks"></i>Quản lý bài đăng</a></li>--}}
      {{--<li class="{{Request::is('maps')?'active':''}}"><a href="{{url('admin/maps')}}"><i class="fa fa-map"></i> <span>Bản đồ</span></a></li>--}}
      {{--<li class="{{Request::is('thongke')?'active':''}}"><a href="{{url('admin/thongke')}}"><i class="fa fa-dashboard"></i> <span>Thống kê</span></a></li>--}}
      {{--<li><a href="{{url('/')}}" target="_blank"><i class="fa fa-eye"></i> <span></span>Giao diện người dùng</a></li>--}}
          <li class="{{ Request::is('LoaiSanPham') ? 'active' : '' }}"><a href=""><i class="">Loại Sản Phẩm</i></a></li>
          <li class=""><a href=""><i class="">Sản Phẩm</i></a></li>
          <li class=""><a href=""><i class="">Tài Khoản</i></a></li>
          <li class=""><a href=""><i class="">Thông báo</i></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
