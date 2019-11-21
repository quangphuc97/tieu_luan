@extends('front-end.layout.index')
@section('title')
    <title>Thông báo </title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/product.css">
@endsection
@section('main-content')
    @foreach($ds_thong_bao as $data)
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 tintuc">
                        <div class="d-block d-md-flex listing-horizontal" >
                            <div class="lh-content">
                                <h3><a href="{{route('thong-bao-load',['id'=>$data->id])}}">{{$data->tieu_de}}</a> <span class="thoi_gian">({{$data->bat_dau}} đến {{$data->ket_thuc}})</span></h3>
                                {!!$data->noi_dung!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div style="margin-left: 30%">
        {{$ds_thong_bao->links()}}
    </div>
@endsection
<style>
.thoi_gian{
    font-size: 15px;
}
    .tintuc
    {
        margin-left: 20%;
        border-bottom: 2px solid #100b0b;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
.lh-content p {
    white-space: nowrap;
    width: 500px;
    overflow: hidden;
    text-overflow: ellipsis;
}
.page-item.active .page-link {
    z-index: 1 !important;
}
</style>
