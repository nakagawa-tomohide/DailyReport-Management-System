@extends('adminlte::page')

@section('title', 'スケジュール')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content_header')

@stop

@section('content')

<body>
    <div class="card card-row card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                スケジュール
            </h3>
        </div>
        <div class="card-body">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <div style="width: 60%;margin: auto">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
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