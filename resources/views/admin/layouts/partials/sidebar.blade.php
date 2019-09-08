<aside class="main-sidebar">
  <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Danh mục</li>
          <li class="{{(request()->is('admin/danhsachloai*')? 'active':'')}}"><a href="{{route('danhsachloai.index')}}"><i class="">Loại Sản Phẩm</i></a></li>
          <li class="{{(request()->is('admin/sanpham*')? 'active':'')}}"><a href="{{route('sanpham.index')}}"><i class="">Sản Phẩm</i></a></li>
          <li class="{{(request()->is('admin/taikhoan*')?'active':'')}}"><a href=""><i class="">Tài Khoản</i></a></li>
          <li class="{{(request()->is('admin/thongbao*')?'active':'')}}"><a href=""><i class="">Thông báo</i></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
