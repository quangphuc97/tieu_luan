@extends('front-end.layout.index')
@section('title')
    <title>Thông báo </title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/product.css">
@endsection
@section('main-content')
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 tintuc">
                        <div class="d-block d-md-flex listing-horizontal" >
                            <div class="lh-content">
                                <h3><span>{{$data->tieu_de}} </span><span class="thoi_gian">({{$data->bat_dau}} đến {{$data->ket_thuc}})</span></h3>
                                {!!$data->noi_dung!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
<style>
    .thoi_gian{
        font-size: 15px;
    }
    .tintuc
    {
        margin-left: 20%;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
</style>