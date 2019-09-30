@extends('admin.layouts.index')

@section('title')
    Admin quản lý
@endsection


@section('main-content')
    <h3 align="center">DANH SÁCH THÔNG BÁO</h3>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <a href="{{ route('thongbao.create') }}" class="btn btn-primary">Thêm</a>
    <div class="box">
        <table class="table table-borderaced">
            <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>

            @foreach($ds_thong_bao as $thong_bao)
                <tr>
                    <td>{{ $thong_bao->tieu_de }}</td>
                    <td>{{ $thong_bao->bat_dau }}</td>
                    <td>{{ $thong_bao->ket_thuc}}</td>
                    <td>
                        <a href="{{ route('thongbao.edit', ['id' => $thong_bao->id]) }}" class="btn btn-primary pull-left">Sửa</a></a>
                        <form method="post" action="{{ route('thongbao.destroy', ['id' =>  $thong_bao->id]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$ds_thong_bao->links()}}
@endsection