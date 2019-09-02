@extends('admin.layouts.index')

@section('title')
    Admin quản lý
@endsection


@section('main-content')
    <h3 align="center">DANH SÁCH LOẠI SẢN PHẨM</h3>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <a href="{{ route('danhsachloai.create') }}" class="btn btn-primary">Thêm</a>
    <div class="box">
        <table class="table table-borderaced">
            <thead>
            <tr>
                <th>Mã Loại Sản Phẩm</th>
                <th>Tên Loại Sản Phẩm</th>
                <th>Ngày Tạo Loại Sản Phẩm</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>

            @foreach($danhsachloai as $loai)
                <tr>
                    <td>{{ $loai->ma_loai }}</td>
                    <td>{{ $loai->ten_loai}}</td>
                    <td>{{ $loai->created_at}}</td>
                    <td>
                        <a href="{{ route('danhsachloai.edit', ['id' => $loai->ma_loai]) }}" class="btn btn-primary pull-left">Sửa</a></a>
                        <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $loai->ma_loai]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$danhsachloai->links()}}
@endsection