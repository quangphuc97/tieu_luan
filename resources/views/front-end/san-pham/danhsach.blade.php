@extends('front-end.layout.index')
@section('title')
    <title>Loại sản phẩm</title>
@endsection
@section('css')

@endsection
@section('main-content')
    <div class="products">
        <div class="container">
    <div class="row">
        <div class="col">
            <div class="product_grid">
                @foreach($ds_sp as $san_pham)
                    <div class="product">
                    <div class="product_image"><img src="{{asset('storage/photos/' . $san_pham->anh_dai_dien)}}" alt="">
                    </div>
                    <div class="product_content">
                        <div class="product_title"><a href="#">{{ $san_pham->ten}}</a></div>
                        <div class="product_price">{{ $san_pham->gia}}</div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection

