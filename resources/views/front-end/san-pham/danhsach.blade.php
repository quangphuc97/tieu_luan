@extends('front-end.layout.index')
@section('title')
    <title>Loại sản phẩm</title>
@endsection
@section('css')

@endsection
@section('main-content')
    <h2 style="margin-left: 10%">@if(isset($loai)){{$loai->ten_loai}} @else Tất cả  sản phẩm @endif</h2>
    <div class="products">
        <div class="container">
    <div class="row">
        <div class="col">
            <div class="product_grid">
                @foreach($ds_sp as $san_pham)
                    <div class="product">
                    <div class="product_image">
                        <a href="{{url('/sanpham/'.$san_pham->ma_san_pham)}}"><img src="{{asset('storage/photos/' . $san_pham->anh_dai_dien)}}" alt=""></a>
                    </div>
                    <div class="product_content">
                        <div class="product_title"><a href="{{url('/sanpham/'.$san_pham->ma_san_pham)}}">{{ $san_pham->ten_san_pham}}</a></div>
                        <div class="product_price">{{ $san_pham->gia}} VND</div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        </div>
        ,<div style="margin-left: 30%;font-size: 17px;">
            {{ $ds_sp->links() }}
        </div>

    </div>
@endsection

