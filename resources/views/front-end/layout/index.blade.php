<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/bootstrap4/bootstrap.min.css">
    <link href="{{url('front-end')}}/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{url('css')}}/style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    @yield('title')
    @yield('css')
    @yield('custom-scripts')
</head>
<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" style="margin-left: 200px">

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('trang-chu')}}">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                            use App\LoaiSanPham;
                            $ds_loai = LoaiSanPham::all();
                            foreach ($ds_loai as $loai )
                                {
                                    echo '<a class="dropdown-item" href="'.url('/loaisanpham').'?id='.$loai->ma_loai.'">'.$loai->ten_loai.'</a>';
                                }
                            ?>
                          <a class="dropdown-item" href="{{url('/loaisanpham')}}">Tất cả</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('lichhoc')}}">Lịch học</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('giao-vien-dang-nhap')}}">Giáo viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('thong-bao-index')}}">Thông báo</a>
                    </li>
                </ul>
            </div>
            </div>

            <div class="navbar-collapse collapse w-50 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto" style="padding-right: 30%;">
                 <?php
                        use App\HocVien;
                        use App\GiaoVien;
                        $id_giao_vien= Session::get('id_giao_vien');
                        $giao_vien = GiaoVien::find($id_giao_vien);
                    $id_hoc_vien=  Session::get('id_hoc_vien');
                    $hoc_vien = HocVien::find($id_hoc_vien);
                  if (empty($id_hoc_vien)&&empty($id_giao_vien)){
                    echo '<li class="nav-item">
                        <a class="nav-link" href="'.route('dang-ky').'">Đăng ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="'.route('dang-nhap').'">Đăng nhập</a>
                    </li>';}
                    else {
                      if(!empty($id_giao_vien)){
                          echo   ' <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$giao_vien->username.'
                        </a>
                        <div class="dropdown-menu" aria-labelledby="user">
                            <a class="dropdown-item" href="'.route('chinh-sua-giao-vien').'">Tài Khoản</a>
                             <a class="dropdown-item" href="'.route('lichday').'?id='.$giao_vien->id_giao_vien.'">Lịch dạy</a>
                            <a class="dropdown-item" href="'.route('dang-xuat').'">Đăng xuất</a>
                        </div>
                    </li>';
                      }
                      else {
                    echo   ' <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$hoc_vien->username.'
                        </a>
                        <div class="dropdown-menu" aria-labelledby="user">
                            <a class="dropdown-item" href="'.route('chinh-sua').'">Tài Khoản</a>
                             <a class="dropdown-item" href="'.route('lichhoc').'?id='.$hoc_vien->id_hoc_vien.'">Lịch học</a>
                            <a class="dropdown-item" href="'.route('dang-xuat').'">Đăng xuất</a>
                        </div>
                    </li>';
                      }
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Menu -->

    <!-- Home -->
    <div class="main">
        @yield('main-content')
    </div>

    <!-- Footer -->

    <div class="footer_overlay"></div>
    <footer class="footer">
        <div class="footer_background" style="background-image:url({{url('front-end')}}/images/footer.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                        <div class="footer_logo"><a href="#">CTU</a></div>
                        <div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                        <div class="footer_social ml-lg-auto">
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

{{--<script src="{{url('front-end')}}/js/jquery-3.2.1.min.js"></script>--}}
<script src="{{url('front-end')}}/styles/bootstrap4/popper.js"></script>
<script src="{{url('front-end')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{url('front-end')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{url('front-end')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{url('front-end')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{url('front-end')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{url('front-end')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{url('front-end')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{url('front-end')}}/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{url('front-end')}}/plugins/easing/easing.js"></script>
<script src="{{url('front-end')}}/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{url('front-end')}}/js/custom.js"></script>

</body>
</html>
<style>
    .navbar{
        font-size:17px;
    }
</style>