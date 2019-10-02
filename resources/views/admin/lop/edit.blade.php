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
<div class="col-md-11s">
<div class="box box-primary">
<form method="post" action="{{ route('lop.update', ['id' => $lop->ma_lop]) }}">
    <input type="hidden" name="_method" value="PUT" />
    <div class="box-body">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="ten_lop">Tên lớp</label>
            <input type="text" value="{{$lop->ten_lop}}" class="form-control" id="ten_lop" name="ten_lop" placeholder="Điền tên lớp">
        </div>

        <div class="form-group">
            <label for="giao_vien">Giáo viên</label>
            <select name="id_giao_vien" class="form-control">
                @foreach($ds_gv as $gv)
                    <option value="{{ $gv->id_giao_vien }}" @if ($gv->id_giao_vien==$lop->id_giao_vien) selected @else select @endif>{{ $gv->ho_ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="si_so">Sỉ số</label>
            <input type="number"  value="{{$lop->si_so}}" class="form-control" id="si_so" name="si_so"
                   min="10" required>
        </div>

        <div class="form-group">
            <label for="trang_thai">Trạng Thái</label>
            <select name="trang_thai" class="form-control">
                    <option value="{{App\Lop::$hoat_dong}}" @if(App\Lop::$hoat_dong==$lop->trang_thai) selected @else select @endif> {{App\Lop::$hoat_dong}}</option>
                <option value="{{App\Lop::$khong_hoat_dong}}" @if(App\Lop::$khong_hoat_dong==$lop->trang_thai) selected @else select @endif> {{App\Lop::$khong_hoat_dong}}</option>
            </select>
        </div>
        <a href="{{route('lop.index')}}">  <button type="button" class="btn ">Quay lại</button></a>
        <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div></div>
@endsection