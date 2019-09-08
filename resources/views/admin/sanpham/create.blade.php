@extends('admin.layouts.index')

@section('title')
Thêm mới loại nông sản
@endsection

@section('main-content')
<h3 align="center">Thêm Sản Phẩm</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-12">
<div class="box box-primary">
  
<form id="frmThemSanPham" method="post" action="{{route('sanpham.store')}}" enctype="multipart/form-data">
<div class="box-body">
{{csrf_field()}} 
    <div class="form-group">
        <label for="ten_lsp">Tên Sản Phẩm</label>
        <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" placeholder="Điền tên sản phẩm">
    </div>
    <div class="form-group">
        <label for="ma_lsp">Loại Sản Phẩm</label>
        <select name="ma_lsp" class="form-control">
            @foreach($ds_loai as $loai)
                <option value="{{ $loai->ma_loai }}" select>{{ $loai->ten_loai }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ma_lsp">Giá Sản Phẩm</label>
            <input type="number" class="form-control" id="gia" name="gia" min="1000">
    </div>
    <div class="form-group">
        <label for="mo_ta">Diễn Giải</label>
        <textarea name ="dien_giai" id="dien_giai" class="form-control ckeditor" rows="5"  required></textarea>
    </div>

    <label>Hình đại diện</label>
    <div class="form-group">
        <div class="file-loading">
            <input id="hinh_anh" type="file" name="hinh_anh" required>
        </div>
    </div>

    <label>Hình ảnh liên quan</label>
    <div class="form-group">
        <div class="file-loading">

            <input id="hinhanhlienquan" type="file" name="hinhanhlienquan[]" multiple>
        </div>
    </div>

    <a href="{{route('sanpham.index')}}">  <button type="button" class="btn ">Quay lại</button></a>
     <button type="reset" class="btn ">Hoàn nguyên</button></a>
    <button type="submit" class="btn btn-primary">Lưu</button>
</div>
</form>
</div>
</div>
@endsection
@section('custom-scripts')
    <!-- Các script dành cho thư viện bootstrap-fileinput -->
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $("#hinh_anh").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false
            });

            $("#hinhanhlienquan").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                allowedFileExtensions: ["jpeg","jpg", "gif", "png", "txt"]
            });
        });
    </script>

    <!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>


@endsection
<style>
    .kv-file-content{
        width: auto;
        height: auto;
        max-width: 33.33%;
        max-height: 33.33%;    }
</style>