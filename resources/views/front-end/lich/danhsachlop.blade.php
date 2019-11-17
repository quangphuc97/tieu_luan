@extends('front-end.layout.index')
@section('title')
    <title>Đăng ký học</title>
@endsection
@section('css')
@endsection
@section('main-content')
    <div class="danhsachlop">
    <h3 align="center">DANH SÁCH LỚP</h3>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} alert-dismissible">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <div class="box">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h6>Tên Lớp: {{$lop->ten_lop}}</h6>
                    <h6>Tên Giáo viên: {{$lop->giaovien->ho_ten}}</h6>
                </div>
                <div class="col-md-5">
                    <h6>Sỉ Số: {{$si_so}}/ {{$lop->si_so}}</h6>
                    <h6>Trạng thái: {{$lop->trang_thai}}</h6>
                </div>
            </div>
        </div>
        <table class="table table-borderaced">
            <thead>
            <tr>
                <th>Họ tên học viên </th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Trạng Thái</th>
            </tr>
            </thead>
            <tbody>

            @foreach($lop->hoc as $hoc)
                <tr>
                    <td>{{$hoc->hocvien->ho_ten}}</td>
                    <td>{{$hoc->hocvien->sdt}}</td>
                    <td>{{$hoc->hocvien->dia_chi}}</td>
                    <td>{{$hoc->trang_thai}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
<style>
    .danhsachlop{
        color:black;
        text-align: center;
    }
    th{
        color:black;
    }
    td{
        color: #0f0f0f;
    }
</style>