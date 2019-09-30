@extends('admin.layouts.index')

@section('title')
    Thêm mới thông báo
@endsection
@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('main-content')
    <h3 align="center">Thêm Thông Báo</h3>
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

            <form method="post" action="{{route('thongbao.store')}}" enctype="multipart/form-data">
                <div class="box-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="tieu_de">Tiêu đề</label>
                        <input type="text" class="form-control" value="{{ old('tieu_de')}}" id="tieu_de"
                               name="tieu_de" placeholder="Điền tiêu đề" required>
                    </div>

                    <div class="form-group">
                        <label for="noi_dung">Nội dung</label>
                        <textarea name="noi_dung" id="noi_dung"
                                  class="form-control ckeditor" rows="5" required>{{ old('noi_dung')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="bat_dau">Ngày bắt đầu</label>
                        <input type="date" name="bat_dau">
                    </div>

                    <div class="form-group">
                        <label for="ket_thuc">Ngày kết thúc</label>
                        <input type="date" name="ket_thuc">
                    </div>


                    <a href="{{route('thongbao.index')}}">
                        <button type="button" class="btn ">Quay lại</button>
                    </a>
                    <button type="reset" class="btn ">Hoàn nguyên</button>
                    </a>
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


    <!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>


@endsection
