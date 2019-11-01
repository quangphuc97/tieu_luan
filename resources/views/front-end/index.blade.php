@extends('front-end.layout.index')
@section('title')
    <title>Trang chủ</title>
    @endsection
@section('main-content')
    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url({{url('front-end')}}/images/anh_hoc_1.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">Dạy Taekwondo </div>
                                        <div class="home_slider_subtitle">Dạy taekwondo cho mọi lứa tuổi</div>
                                        <div class="button button_light home_button"><a href="#">Đăng kí học ngay</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url({{url('front-end')}}/images/anh_hoc_2.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">Chuyên bán sản phẩm Taekwondo.</div>
                                        <div class="home_slider_subtitle">Sản phẩm rẻ và chất lượng</div>
                                        <div class="button button_light home_button"><a href="#">Mua ngay</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->


            </div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                    <li class="home_slider_custom_dot active">01.</li>
                                    <li class="home_slider_custom_dot">02.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="product_grid">
                        <?php
                        use App\SanPham;
                        $ds_san_pham = SanPham::all()->take(6);
                        foreach ($ds_san_pham as $san_pham)
                        {
                            echo '     <div class="product">
                            <div class="product_image"><a href="'.route('load-san-pham',['id'=>$san_pham->ma_san_pham]).'"><img src="'.asset('storage/photos/' . $san_pham->anh_dai_dien).'" alt=""></a></div>
                            <div class="product_extra product_sale"><a href="'.url('/loaisanpham/?id=').$san_pham->loaisanpham->ma_loai.'">'.$san_pham->loaisanpham->ten_loai.'</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="'.route('load-san-pham',['id'=>$san_pham->ma_san_pham]).'">'.$san_pham->ten_san_pham.'</a></div>
                                <div class="product_price">'.$san_pham->gia.' VND</div>
                            </div>
                        </div>';
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_border"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                        <?php
                        use App\ThongBao;
                        $ds_thong_bao= ThongBao::all()->sortByDesc("bat_dau")->take(4);
                        foreach ($ds_thong_bao as $thong_bao){
                            echo '  <div class="newsletter_content text-center" style="	border-bottom: solid 2px #e3e3e3;">';
                            echo '
                          <div class="newsletter_title">'.$thong_bao->tieu_de.'</div>
                        <div class="newsletter_text"><p>'.$thong_bao->noi_dung.'</p></div>
                       ';
                        echo '  </div>';
                        }
                        ?>
                            <div class="newsletter_content text-center" style="margin-top: -100px">
                            <div class="newsletter_form_container">
                                <a href=""><button class="newsletter_button trans_200"><span>Xem tất cả</span></button></a>
                            </div>
                            </div>

                </div>
            </div>
        </div>
    </div>

@endsection