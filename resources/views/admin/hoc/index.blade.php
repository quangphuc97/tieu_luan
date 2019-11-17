@extends('admin.layouts.index')

@section('title')
    Admin quản lý
@endsection


@section('main-content')
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
                <th>Trạng Thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>

            @foreach($lop->hoc as $hoc)
                <tr>
                    <td>{{$hoc->hocvien->ho_ten}}</td>
                    <td>{{$hoc->trang_thai}}</td>
                    <td>
                       @if($hoc->trang_thai!= App\Hoc::$trang_thai_xu_ly) <a href="{{route('duyethoc',['id' => $hoc->id])}}" class="btn btn-primary pull-left">Duyệt</a>
                        @else <a href="#" class="btn btn-primary pull-left">Duyệt</a>
                        @endif
                        <form method="post" action="{{ route('xoahoc', ['id' => $hoc->id]) }}">
                            {{ csrf_field() }}
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection