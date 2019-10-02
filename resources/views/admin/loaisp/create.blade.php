@extends('admin.layouts.index')

@section('title')
Thêm mới loại sản phẩm
@endsection

@section('main-content')
<h3 align="center">Thêm Loại Sản Phẩm</h3>
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
  
<form id="frmThemloai" method="post" action="{{route('danhsachloai.store')}}">
<div class="box-body">
{{csrf_field()}} 
    <div class="form-group">
        <label for="ten_lsp">Tên loại</label>
        <input type="text" class="form-control" id="ten_loai" name="ten_loai" placeholder="Điền tên loại sản phẩm">
    </div>
    <a href="{{route('danhsachloai.index')}}">  <button type="button" class="btn ">Quay lại</button></a>
    <button type="submit" class="btn btn-primary">Lưu</button>
</div>
</form>
</div>
</div>
@endsection