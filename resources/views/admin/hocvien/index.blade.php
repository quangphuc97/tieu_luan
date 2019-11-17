@extends('admin.layouts.index')

@section('title')
    Admin quản lý
@endsection


@section('main-content')
    <h3 align="center">DANH SÁCH HỌC VIÊN</h3>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} ">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <a href="{{ route('hocvien.create') }}" class="btn btn-primary">Thêm</a>
    <div class="box">
        <table class="table table-borderaced">
            <thead>
            <tr>
                <th>Username</th>
                <th>Họ tên</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>

            @foreach($ds_hv as $hv)
                <tr>
                    <td>{{ $hv->username}}</td>
                    <td>{{ $hv->ho_ten}}</td>
                    <td>{{ $hv->sdt}}</td>
                    <td>{{ $hv->dia_chi}}</td>
                    <td>
                        <a href="{{ route('hocvien.edit', ['id' => $hv->id_hoc_vien]) }}" class="btn btn-primary pull-left">Sửa</a></a>
                        <form method="post" action="{{ route('hocvien.destroy', ['id' => $hv->id_hoc_vien]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$ds_hv->links()}}
@endsection