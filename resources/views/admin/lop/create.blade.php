@extends('admin.layouts.index')

@section('title')
Thêm mới lớp
@endsection

@section('main-content')
<h3 align="center">Thêm Lớp</h3>
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
  
<form id="frmThemloai" method="post" action="{{route('lop.store')}}">
<div class="box-body">
{{csrf_field()}} 
    <div class="form-group">
        <label for="ten_lop">Tên lớp</label>
        <input type="text" class="form-control" id="ten_lop" name="ten_lop" placeholder="Điền tên lớp">
    </div>

    <div class="form-group">
        <label for="ma_lsp">Giáo viên</label>
        <select name="id_giao_vien" class="form-control">
            @foreach($ds_gv as $gv)
                @if(old('id_giao_vien')==$gv->id_giao_vien)
                    <option value="{{ $gv->id_giao_vien }}" selected>{{$gv->ho_ten }}</option>
                @else
                    <option value="{{ $gv->id_giao_vien }}" select>{{ $gv->ho_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="si_so">Sỉ số</label>
        <input type="number" value="{{ old('si_so')}}" class="form-control" id="si_so" name="si_so"
               min="10" required>
    </div>
    <a href="{{route('lop.index')}}">  <button type="button" class="btn ">Quay lại</button></a>
    <button type="submit" class="btn btn-primary">Lưu</button>
</div>
</form>
</div>
</div>
@endsection