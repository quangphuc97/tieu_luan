
@extends('admin.layouts.index')

@section('title')
    Admin quản lý
@endsection


@section('main-content')
    <h3 align="center">LỊCH GIẢNG DẠY</h3>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
    <form method="POST" action="{{route('lich.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="ma_lop">Lớp</label>
            <select name="ma_lop" class="form-control">
                @foreach($ds_lop as $lop)
                    @if(old('ma_lop')==$lop->ma_lop)
                        <option value="{{ $lop->ma_lop }}" selected>{{ $lop->ten_lop }}</option>
                    @else
                        <option value="{{ $lop->ma_lop }}" select>{{ $lop->ten_lop }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <label for="">Màu hiển thị</label>
        <input class="form-control" type="color" name="color"/>
        <br/>
        <div class="row">
            <div class="col-md-3">
              <div><label>Buổi 1</label></div>
                <div><label>Thời gian</label></div>
                <input type="datetime-local" class="form-control" name="start_date[]"required/>
            </div>
            <div class="col-md-3">
                <div><label>Buổi 2</label></div>
                <div><label>Thời gian</label></div>
                <input type="datetime-local" class="form-control" name="start_date[]" required/>
            </div>
            <div class="col-md-3">
                <div><label>Buổi 3</label></div>
                <div><label>Thời gian</label></div>
                <input type="datetime-local" class="form-control" name="start_date[]" required/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        @if (session()->has('error'))
            <div class="alert alert-danger">{{  session()->get('error') }} </div>
        @endif
    </form>
        </div>
    </div>

@endsection