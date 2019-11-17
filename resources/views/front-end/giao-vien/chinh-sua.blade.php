@extends('front-end.layout.index')
@section('title')
    <title>Chỉnh sửa tài khoản</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/contact.css">
@endsection
@section('main-content')
    {{--<div class="taikhoan">--}}
        {{--<div class="container bootstrap snippet">--}}
            {{--@foreach (['danger', 'warning', 'success', 'info'] as $msg)--}}
                {{--@if(Session::has('alert-' . $msg))--}}
                    {{--<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>--}}
                {{--@endif--}}
            {{--@endforeach--}}
            {{--<div class="row" >--}}
                {{--<div class="col-sm-12"><h2 style="text-align: center">Chỉnh sửa tài khoản giáo viên</h2></div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-3"><!--left col-->--}}
                        {{--<div class="text-center">--}}
                            {{--<div class="col-sm-10">Tên đăng nhập: <h2>{{$giao_vien->username}}</h2></div>--}}
                            {{--<div class="col-sm-2"></div>--}}
                        {{--</div><br>--}}

                {{--</div>--}}
                {{--<div class="col-sm-8" style="margin-left: 20px;">--}}
                    {{--<ul class="nav nav-tabs">--}}
                        {{--<li  class="nav-item "><a class="nav-link active" data-toggle="tab" href="#home">Thông tin</a></li>--}}
                        {{--<li class="nav-item "><a data-toggle="tab" class="nav-link" href="#messages">Đổi mật khẩu</a></li>--}}
                    {{--</ul>--}}
                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane active" id="home">--}}
                            {{--<form class="form" action="{{route('chinh-sua-giao-vien')}}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data" files="true" id="registrationForm" onsubmit="return checkPhoneNumber()">--}}
                                {{--{{ csrf_field() }}--}}
                            {{--<hr>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="first_name">Họ tên</label>--}}
                                        {{--<input type="text"  required="required" class="form-control" name="ho_ten" value="{{$giao_vien->ho_ten}}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="col-sm-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="phone">Số điện thoại</label>--}}
                                        {{--<input type="text"  required="required" class="form-control" onchange="return checkPhoneNumber()" id="sdt" name="sdt" value="{{$giao_vien->sdt}}"  >--}}
                                        {{--<div id="flag_sdt" style="color:red;"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="email">Email</label>--}}
                                        {{--<input type="email"  required="required" onchange="return checkmail()" class="form-control" id="email" name="email" value="{{$giao_vien->email}}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="col-sm-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="diachi">Địa chỉ</label>--}}
                                        {{--<input type="text"   required="required" class="form-control" name="dia_chi" value="{{$giao_vien->dia_chi}}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-12">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<br>--}}
                                        {{--<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>--}}
                                        {{--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                            {{--</div>--}}
                            {{--</form>--}}
                        {{--</div><!--/tab-pane-->--}}
                        {{--<div class="tab-pane" id="messages">--}}

                            {{--<h2></h2>--}}

                            {{--<hr>--}}
                            {{--<form class="form" action="{{route('chinh-sua-pass-giao-vien')}}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data" files="true" id="registrationForm" onsubmit="return checkPassWord()">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<div class="form-group">--}}

                                    {{--<div class="col-xs-6">--}}
                                        {{--<label for="password">Mật khẩu cũ</label>--}}
                                        {{--<input type="password"  required="required" class="form-control" name="password_cu" placeholder="Password cũ" >--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="form-group">--}}

                                    {{--<div class="col-xs-6">--}}
                                        {{--<label for="password">Mật khẩu mới</label>--}}
                                        {{--<input type="password"  required="required" onchange="return checkPassWord()" class="form-control" name="password" id="password" placeholder="Password mới" >--}}
                                        {{--<div id="flag_password" style="color:red;"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}

                                    {{--<div class="col-xs-6">--}}
                                        {{--<label for="password2">Xác nhận</label>--}}
                                        {{--<input type="password"  required="required" onchange="return checkPassWord()" class="form-control"  id="password1" placeholder="Xác nhận">--}}
                                        {{--<div id="flag_password1"  style="color:red;"></div>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="col-xs-12">--}}
                                        {{--<br>--}}
                                        {{--<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>--}}
                                        {{--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div><!--/tab-pane-->--}}

                    {{--</div><!--/tab-pane-->--}}
                {{--</div><!--/tab-content-->--}}

            {{--</div><!--/col-9-->--}}
        {{--</div><!--/row-->--}}
    {{--</div>--}}
    <div class="taikhoan">
        <div class="container bootstrap snippet">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
            <div class="row">
                <div class="col-sm-10"><h1>{{$giao_vien['username']}}</h1></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><!--left col-->

                    <form class="form" action="{{route('chinh-sua-giao-vien')}}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data" files="true" id="registrationForm" onsubmit="return checkPhoneNumber()">
                        {{ csrf_field() }}
                        <div class="text-center">
                            <img src="{{ asset('storage/photos/' . $giao_vien['anh_dai_dien']) }}" class="avatar img-circle img-thumbnail" id="blah" alt="anh_dai_dien">
                            <h6>Upload a different photo...</h6>
                            <input type="file" name="anh_dai_dien" accept="image/*" class="text-center center-block file-upload"    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                        </div><br>
                </div><!--/col-3-->
                <div class="col-sm-8" style="margin-left: 20px;">
                    <ul class="nav nav-tabs">
                        <li  class="nav-item "><a class="nav-link active" data-toggle="tab" href="#home">Thông tin</a></li>
                        <li class="nav-item "><a data-toggle="tab" class="nav-link" href="#messages">Đổi mật khẩu</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="first_name">Họ tên</label>
                                        <input type="text"  required="required" class="form-control" name="ho_ten" value="{{$giao_vien['ho_ten']}}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text"  required="required" class="form-control" onchange="return checkPhoneNumber()" id="sdt" name="sdt" value="{{$giao_vien['sdt']}}"  >
                                        <div id="flag_sdt" style="color:red;"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"  required="required" onchange="return checkmail()" class="form-control" id="email" name="email" value="{{$giao_vien['email']}}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="diachi">Địa chỉ</label>
                                        <input type="text"   required="required" class="form-control" name="dia_chi" value="{{$giao_vien['dia_chi']}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>

                                </form>
                                <hr>
                            </div>
                        </div><!--/tab-pane-->
                        <div class="tab-pane" id="messages">

                            <h2></h2>

                            <hr>
                            <form class="form" action="{{route('chinh-sua-pass-giao-vien')}}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data" files="true" id="registrationForm" onsubmit="return kiemtra()">
                                {{ csrf_field() }}
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">Mật khẩu cũ</label>
                                        <input type="password"  required="required" class="form-control" name="password_cu" placeholder="Password cũ" >
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">Mật khẩu mới</label>
                                        <input type="password"  required="required" onchange="return kiemtrapassword()" class="form-control" name="password" id="password" placeholder="Password mới" >
                                        <div id="flag_password" style="color:red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password2">Xác nhận</label>
                                        <input type="password"  required="required" onchange="return kiemtrapassword1()" class="form-control"  id="password1" placeholder="Xác nhận">
                                        <div id="flag_password1"  style="color:red;"></div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div><!--/tab-pane-->

                    </div><!--/tab-pane-->
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </div><!--/row-->
    </div>
@endsection
@section('custom-scripts')
    <script>

        function checkPassWord() {
            var password = document.getElementById("password").value;
            var password1 = document.getElementById("password1").value;
            if (password == password1 || password1.length == 0) {
                $("#flag_password1").html("");
                return true;
            }
            else {
                $("#flag_password1").html("Password không trùng khớp");
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
    @endsection

