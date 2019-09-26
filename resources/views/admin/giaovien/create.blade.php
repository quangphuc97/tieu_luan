@extends('admin.layouts.index')

@section('title')
    Thêm mới tài khoản giáo viên
@endsection
@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet"
          type="text/css"/>
@endsection
@section('main-content')
    <h3 align="center">Thêm Tài Khoản Giáo Viên</h3>
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

            <form method="post" action="{{route('giaovien.store')}}" enctype="multipart/form-data"
                  onsubmit="return checkForm()">
                <div class="box-body">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="ho_ten">Họ tên</label>
                        <input type="text" class="form-control" value="{{ old('ho_ten')}}" id="ho_ten"
                               name="ho_ten" placeholder="Điền họ tên" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" value="{{ old('username')}}" id="username"
                               name="username" placeholder="Điền username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" value="{{ old('password')}}" class="form-control" id="password"
                               name="password"
                               minlength="6" maxlength="10" placeholder="Điền password" onchange="checkPassWord()"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="password1">Nhập lại password</label>
                        <input type="password" value="{{ old('password')}}" class="form-control" id="password1"
                               name="password1"
                               minlength="6" maxlength="10" placeholder="Nhập lại password" onchange="checkPassWord()"
                               required>
                        <div style="color:red" id="msg"></div>
                    </div>

                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ</label>
                        <input type="text" class="form-control" value="{{ old('dia_chi')}}" id="dia_chi"
                               name="dia_chi" placeholder="Điền địa chỉ" required>
                    </div>

                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" class="form-control" value="{{ old('sdt')}}" id="sdt"
                               name="sdt" placeholder="Điền điện thoại" onchange="checkPhoneNumber()" required>
                        <div style="color:red" id="flag_sdt"></div>

                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="{{ old('email')}}" id="email"
                               name="email" placeholder="Điền email" onchange="checkmail()" required>
                        <div style="color:red" id="flag_email"></div>

                    </div>

                    <label>Hình đại diện</label>
                    <div class="form-group">
                        <div class="file-loading">
                            <input id="hinh_anh" type="file" name="hinh_anh">
                        </div>
                    </div>


                    <a href="{{route('giaovien.index')}}">
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
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}"
            type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $("#hinh_anh").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false
            });
        });

        function checkPassWord() {
            var password = document.getElementById("password").value;
            var password1 = document.getElementById("password1").value;
            if (password == password1 || password1.length == 0) {
                $("#msg").html("");
                return true;
            }
            else {
                $("#msg").html("Password không trùng khớp");
                return false;
            }
        }

        function checkForm() {
            return checkPassWord()&&checkPhoneNumber()&&checkmail();
        }

        function checkPhoneNumber() {
            var flag = false;
            var phone = $('#sdt').val().trim(); // ID của trường Số điện thoại
            phone = phone.replace('(+84)', '0');
            phone = phone.replace('+84', '0');
            phone = phone.replace('0084', '0');
            phone = phone.replace(/ /g, '');
            if (phone != '') {
                var firstNumber = phone.substring(0, 2);
                if ((firstNumber == '09' || firstNumber == '08') && phone.length == 10) {
                    if (phone.match(/^\d{10}/)) {
                        flag = true;
                    }
                } else if (firstNumber == '01' && phone.length == 11) {
                    if (phone.match(/^\d{11}/)) {
                        flag = true;
                    }
                }
            }
            if (flag) $("#flag_sdt").html(""); else $("#flag_sdt").html("Nhập số điện thoại sai định dạng");
            return flag;
        }

        function checkmail() {
            var email = document.getElementById('email').value;
            var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
            if (emailFilter.test(email)) $("#flag_email").html(""); else $("#flag_email").html("Email sai định dạng");
            return emailFilter.test(email);
        }
    </script>

    <!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>


@endsection
