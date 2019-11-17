@extends('front-end.layout.index')
@section('title')
    <title>Đăng ký học</title>
@endsection
@section('css')
@endsection
@section('main-content')

    <div class="dang-ky">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>
<h3 >Đăng ký học</h3>
<div class="container">
    <form method="post" action="{{route('dang-ky-hoc',['ma_lop'=>$lop->ma_lop])}}" enctype="multipart/form-data">
            {{csrf_field()}}
    <div class="row">
        <div class="col-md-3">
            <label>Lớp:</label>
        </div>
        <div class="col-md-2">
            <div class="noi-dung">{{$lop->ten_lop}}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Giáo viên giảng dạy:</label>
        </div>
        <div class="col-md-2">
            <div class="noi-dung">{{$lop->giaovien->ho_ten}}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Trạng thái lớp</label>
        </div>
        <div class="col-md-2">
            <div class="noi-dung">{{$lop->trang_thai}}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Sỉ số</label>
        </div>
        <div class="col-md-2">
            <div class="noi-dung">{{$lop->si_so}}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Số lượng còn lại</label>
        </div>
        <div class="col-md-2">
            <div class="noi-dung">{{$so_luong_con_lai}}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
    </div>
    </form>
    </div>
</div>
@endsection

<style>
    label{
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 700;
    }
    .noi-dung{
        color: black;
    }
    .dang-ky{
        margin-left: 30%;
    }
    .flash-message{
        width: 30%;
    }
</style>