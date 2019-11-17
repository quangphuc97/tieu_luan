@extends('front-end.layout.index')
@section('title')
    <title>Lịch học</title>
@endsection
@section('css')
@endsection
@section('main-content')
   <div style="background-color: #ECF0F5; color:black;padding-left: 20%; margin-top: -43px; padding-top: 20px;">
       <h2 style="text-align: center">Lịch học</h2>
       <div class="panel-body" style="width: 700px; height: 500px;">
           {!! $calendar->calendar()!!}
           {!! $calendar->script()!!}
       </div>
   </div>
@endsection
<style>
    .fc-title{
        color:white;
    }
    .fc-widget-header {
        color :black;
    }
    .fc-day-number {
        color:black !important;
    }
</style>
