@extends('admin.layouts.index')

@section('title')
Hiệu chỉnh sản phẩm
@endsection
@section('custom-css')
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('main-content')
<h3 align="center">Chỉnh Sản Phẩm</h3>
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
<form method="post" action="{{ route('sanpham.update', ['id' => $san_pham->ma_san_pham]) }}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT" />
    <div class="col-md-12">
                <div class="box-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="ten_lsp">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" value="{{$san_pham->ten_san_pham}}" id="ten_san_pham" name="ten_san_pham" placeholder="Điền tên sản phẩm" required>
                    </div>
                    <div class="form-group">
                        <label for="ma_lsp">Loại Sản Phẩm</label>
                        <select name="ma_lsp" class="form-control">
                            @foreach($ds_loai as $loai)

                                <option value="{{ $loai->ma_loai }}" @if ($loai->ma_loai==$san_pham->ma_loai) selected @else select @endif>{{ $loai->ten_loai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ma_lsp">Giá Sản Phẩm</label>
                        <input type="number" value="{{$san_pham->gia}}" class="form-control" id="gia" name="gia" min="1000" required>
                    </div>
                    <div class="form-group">
                        <label for="mo_ta">Diễn Giải</label>
                        <textarea name ="dien_giai" id="dien_giai" class="form-control ckeditor" rows="5"  required> {{$san_pham->dien_giai}}</textarea>
                    </div>

                    <label>Hình đại diện</label>
                    <div class="form-group">
                        <div class="file-loading">
                            <input id="hinh_anh" type="file" name="hinh_anh" >
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
        </div>
    </div>
</form>
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
                append: false,
                showRemove: false,
                autoReplace: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset('storage/photos/' . $san_pham->anh_dai_dien) }}"
                ],
                initialPreviewConfig: [
                    {
                        caption: "{{ $san_pham->anh_dai_dien }}",
                        size: {{ Storage::exists('public/photos/' . $san_pham->anh_dai_dien) ? Storage::size('public/photos/' . $san_pham->anh_dai_dien) : 0 }},
                        width: "120px",
                        url: "{$url}",
                        key: 1
                    },
                ]
            });

            $("#hinhanhlienquan").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                append: false,
                showRemove: false,
                autoReplace: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                allowedFileExtensions: ["jpg", "gif", "png", "txt"],
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreview: [
                    @foreach($san_pham->hinhAnh as $hinhAnh)
                        "{{ asset('storage/photos/' . $hinhAnh->dia_chi) }}",
                    @endforeach
                ],
                initialPreviewConfig: [
                        @foreach($san_pham->hinhAnh as $index=>$hinhAnh)
                    {
                        caption: "{{ $hinhAnh->dia_chi }}",
                        size: {{ Storage::exists('public/photos/' . $hinhAnh->dia_chi) ? Storage::size('public/photos/' . $hinhAnh->dia_chi) : 0 }},
                        width: "120px",
                        url: "{$url}",
                        key: {{ ($index + 1) }}
                    },
                    @endforeach
                ]
            });

        });
    </script>

    <!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

    <script>
        $(document).ready(function(){

        });
    </script>
@endsection


{{--<script>--}}
    {{--$(document).ready(function() {--}}
        {{--$("#hinh_anh").fileinput({--}}
            {{--theme: 'fas',--}}
            {{--showUpload: false,--}}
            {{--showCaption: false,--}}
            {{--browseClass: "btn btn-primary btn-lg",--}}
            {{--fileType: "any",--}}
            {{--append: false,--}}
            {{--showRemove: false,--}}
            {{--autoReplace: true,--}}
            {{--previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",--}}
            {{--overwriteInitial: false,--}}
            {{--initialPreviewShowDelete: false,--}}
            {{--initialPreviewAsData: true,--}}
            {{--initialPreview: [--}}
                {{--"{{ asset('storage/photos/' . $san_pham->anh_dai_dien) }}"--}}
            {{--],--}}
            {{--initialPreviewConfig: [--}}
                {{--{--}}
                    {{--caption: "{{ $san_pham->anh_dai_dien }}",--}}
                    {{--size: " {{Storage::size('public/photos/' . $san_pham->anh_dai_dien)  }}",--}}
                    {{--width: "120px",--}}
                    {{--url: "{{ asset('storage/photos/' . $san_pham->anh_dai_dien) }}",--}}
                    {{--key: 1--}}
                {{--},--}}
            {{--]--}}
        {{--});--}}

        {{--$("#hinhanhlienquan").fileinput({--}}
            {{--theme: 'fas',--}}
            {{--showUpload: false,--}}
            {{--showCaption: false,--}}
            {{--browseClass: "btn btn-primary btn-lg",--}}
            {{--fileType: "any",--}}
            {{--append: false,--}}
            {{--showRemove: false,--}}
            {{--autoReplace: true,--}}
            {{--previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",--}}
            {{--overwriteInitial: false,--}}
            {{--allowedFileExtensions: ["jpg", "gif", "png", "txt"],--}}
            {{--initialPreviewShowDelete: false,--}}
            {{--initialPreviewAsData: true,--}}
            {{--initialPreview: [--}}
                {{--@foreach($san_pham->hinhAnh as $hinhAnh)--}}
                    {{--"{{ asset('storage/photos/' . $hinhAnh->dia_chi) }}",--}}
                {{--@endforeach--}}
            {{--],--}}
            {{--initialPreviewConfig: [--}}
                    {{--@foreach($san_pham->hinhAnh as $index=>$hinhAnh)--}}
                {{--{--}}
                    {{--caption: "{{ $hinhAnh->dia_chi }}",--}}
                    {{--size: {{ Storage::exists('public/photos/' . $hinhAnh->dia_chi) ? Storage::size('public/photos/' . $hinhAnh->dia_chi) : 0 }},--}}
                    {{--width: "120px",--}}
                    {{--url: "{$url}",--}}
                    {{--key: {{ ($index + 1) }}--}}
                {{--},--}}
                {{--@endforeach--}}
            {{--]--}}
        {{--});--}}
    {{--// });--}}
    {{--});--}}
{{--</script>--}}