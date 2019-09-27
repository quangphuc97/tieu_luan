<aside class="main-sidebar">
  <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Danh mục</li>
          <li class="{{(request()->is('admin/danhsachloai*')? 'active':'')}}"><a href="{{route('danhsachloai.index')}}"><i class="">Loại Sản Phẩm</i></a></li>
          <li class="{{(request()->is('admin/sanpham*')? 'active':'')}}"><a href="{{route('sanpham.index')}}"><i class="">Sản Phẩm</i></a></li>
          {{--<ul class="treeview-menu" style="display: {{(request()->is('admin/taikhoan*')?'block':'')}};">--}}
              {{--<li  class="{{(request()->is('admin/taikhoan/giaovien*')? 'active':'')}}">Giáo viên</li>--}}
              {{--<li></li>--}}
          {{--</ul>--}}

          <li class="treeview {{ (request()->is('admin/taikhoan*') ? 'active menu-open' : '') }}">
              <a href="#"><i class="fa fa-edit"></i> <span>Quản lý tài khoản</span>
                  <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu" style="display: {{ (request()->is('admin/taikhoan*') ? 'block' : '') }};">
                  <li class="{{ (request()->is('admin/taikhoan/giaovien*') ? 'active' : '' )}}"><a href="{{ route('giaovien.index') }}"><i class="fa fa-circle-o"></i>Giáo viên</a></li>
                  <li class="{{ (request()->is('admin/taikhoan/hocvien*') ? 'active' : '' )}}"><a href="{{ route('hocvien.index') }}"><i class="fa fa-circle-o"></i>Học viên</a></li>
              </ul>
          </li>
          <li class="{{(request()->is('admin/thongbao*')?'active':'')}}"><a href=""><i class="">Thông báo</i></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
