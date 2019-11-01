@extends('front-end.layout.index')
@section('title')
    <title>Sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/product.css">
@endsection

@section('custom-scripts')
    <script src="{{url('front-end')}}/js/product.js"></script>
@endsection
@section('main-content')
    <div class="product_details" style="margin-top: -30px;">
        <div class="container">
            <div class="row details_row">
                <div class="product_details">
                    <div class="container">
                        <div class="row details_row">
                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large"><img src="{{asset('storage/photos/'.$san_pham->anh_dai_dien)}}" alt=""><div class="product_extra product_new" style="max-width: 100%; max-height: 100%;"><a href="{{url('/loaisanpham')}}/{{$san_pham->loaisanpham->ma_loai}}">{{$san_pham->loaisanpham->ten_loai}}</a></div></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            <div class="details_image_thumbnail active" data-image="{{asset('storage/photos/'.$san_pham->anh_dai_dien)}}"><img src="{{asset('storage/photos/'.$san_pham->anh_dai_dien)}}" alt=""></div>
                       @foreach($san_pham->hinhAnh as $hinh_anh)
                                <div class="details_image_thumbnail" data-image="{{asset('storage/photos/'.$hinh_anh->dia_chi)}}"><img src="{{asset('storage/photos/'.$hinh_anh->dia_chi)}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$san_pham->ten_san_pham}}</div>
                        <div class="details_price">{{$san_pham->gia}}</div>

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Trạng thái:</div>
                            <span>Còn hàng</span>
                        </div>
                        <div class="details_text">
                            <p>{!! $san_pham->dien_giai  !!}</p>
                        </div>

                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix" style="width: 200px">
                                <span>Số lượng</span>
                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="button cart_button"><a href="#">Thêm vào giỏ hàng</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>

@endsection