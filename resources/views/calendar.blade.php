@extends('adminlte::page')

@section('title', 'スケジュール')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content_header')
    <h1>スケジュール</h1>
@stop

@section('content')
<body>
    <div style="width: 50%;margin: auto">
        <div id='calendar'></div>
    </div>
</body>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/js/calendar.js') }}"></script>
@stop
