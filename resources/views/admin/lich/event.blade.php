
@extends('admin.layouts.index')
@section('title')
    Lịch giảng dạy
@endsection
@section('main-content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <h3 align="center">LỊCH GIẢNG DẠY</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <a href="{{ route('lich.create') }}" class="btn btn-primary pull-left">Xếp lịch</a>
    </div>
    <br>
    <div class="panel-body">
        {!! $calendar->calendar()!!}
        {!! $calendar->script()!!}
    </div>
@endsection

