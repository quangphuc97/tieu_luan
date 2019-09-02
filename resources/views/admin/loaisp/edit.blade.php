@extends('admin.layouts.index')

@section('title')
Hiệu chỉnh loại
@endsection

@section('main-content')
<h3 align="center">Chỉnh Loại Sản Phẩm</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-6">
<div class="box box-primary">
<form method="post" action="{{ route('danhsachloai.update', ['id' => $loai->ma_loai]) }}">
    <input type="hidden" name="_method" value="PUT" />
    <div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="ten_lsp">Tên</label>
        <input type="text" class="form-control" id="ten_loai" name="ten_loai" value="{{ $loai->ten_loai }}" placeholder="Nhập tên loại">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
</div></div>
@endsection