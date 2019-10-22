@extends('front-end.layout.index')
@section('title')
    <title>Đăng ký</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/contact.css">
@endsection
@section('main-content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="get_in_touch">
    <form method="post" action="{{route('dang-ky')}}" enctype="multipart/form-data"
          onsubmit="return checkForm()">
        <div class="form-group">
            <h2>Đăng ký tài khoản</h2>
        </div>
        <div class="box-body">
            {{csrf_field()}}

            <div class="form-group">
                <label for="ho_ten">Họ tên</label>
                <input type="text" class="contact_input" value="{{ old('ho_ten')}}" id="ho_ten"
                       name="ho_ten" placeholder="Điền họ tên" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="contact_input" value="{{ old('username')}}" id="username"
                       name="username" placeholder="Điền username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" value="{{ old('password')}}" class="contact_input" id="password"
                       name="password"
                       minlength="6" maxlength="10" placeholder="Điền password" onchange="checkPassWord()"
                       required>
            </div>

            <div class="form-group">
                <label for="password1">Nhập lại password</label>
                <input type="password" value="{{ old('password')}}" class="contact_input" id="password1"
                       name="password1"
                       minlength="6" maxlength="10" placeholder="Nhập lại password" onchange="checkPassWord()"
                       required>
                <div style="color:red" id="msg"></div>
            </div>

            <div class="form-group">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" class="contact_input" value="{{ old('dia_chi')}}" id="dia_chi"
                       name="dia_chi" placeholder="Điền địa chỉ" required>
            </div>

            <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="text" class="contact_input" value="{{ old('sdt')}}" id="sdt"
                       name="sdt" placeholder="Điền điện thoại" onchange="checkPhoneNumber()" required>
                <div style="color:red" id="flag_sdt"></div>

            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="contact_input" value="{{ old('email')}}" id="email"
                       name="email" placeholder="Điền email" onchange="checkmail()" required>
                <div style="color:red" id="flag_email"></div>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
    </form>
        </div>
        </div>
    </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
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
@endsection