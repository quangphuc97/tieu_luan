@extends('front-end.layout.index')
@section('title')
    <title>Giáo viên đăng nhập</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('front-end')}}/styles/contact.css">
@endsection
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <div class="get_in_touch">
                    <form method="post" action="{{route('giao-vien-dang-nhap')}}" enctype="multipart/form-data">
                        <div class="box-body">
                            {{csrf_field()}}
                            <h2>Giáo viên đăng nhập</h2>
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
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
