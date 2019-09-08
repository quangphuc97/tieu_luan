@extends('admin.layouts.index')

@section('title')
    Admin quản lý
@endsection


@section('main-content')
    <h3 align="center">DANH SÁCH SẢN PHẨM</h3>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <a href="{{ route('sanpham.create') }}" class="btn btn-primary">Thêm</a>
    <div class="box">
        <table class="table table-borderaced">
            <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <th>Tên Loại Sản phẩm</th>
                <th>Ngày Tạo</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>

            @foreach($ds_sp as $san_pham)
                <tr>
                    <td>{{ $san_pham->ten_san_pham }}</td>
                    <td>{{ $san_pham->gia }}</td>
                    <td>{{ $san_pham->loaisanpham->ten_loai}}</td>
                    <td>{{ $san_pham->created_at}}</td>
                    <td>
                        <a href="{{ route('sanpham.edit', ['id' => $san_pham->ma_san_pham]) }}" class="btn btn-primary pull-left">Sửa</a></a>
                        <form method="post" action="{{ route('sanpham.destroy', ['id' => $san_pham->ma_san_pham]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$ds_sp->links()}}
@endsection