@extends('admin.layouts.index')

@section('title')
    Admin quản lý
@endsection


@section('main-content')
    <h3 align="center">DANH SÁCH LOẠI LỚP</h3>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <a href="{{ route('lop.create') }}" class="btn btn-primary">Thêm</a>
    <div class="box">
        <table class="table table-borderaced">
            <thead>
            <tr>
                <th>Tên Lớp</th>
                <th>Giáo Viên</th>
                <th>Sỉ Số</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>

            @foreach($danhsachlop as $lop)
                <tr>
                    <td>{{ $lop->ten_lop }}</td>
                    <td>{{ $lop->giaovien->ho_ten}}</td>
                    <td>{{ $lop->si_so}}</td>
                    <td>{{ $lop->trang_thai}}</td>
                    <td>
                        <a href="{{ route('lop.edit', ['id' => $lop->ma_lop]) }}" class="btn btn-primary pull-left">Sửa</a></a>
                        <form method="post" action="{{ route('lop.destroy', ['id' => $lop->ma_lop]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$danhsachlop->links()}}
@endsection