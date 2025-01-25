@extends('adminlte::page')

@section('title', 'ホーム')

@section('content_header')

@stop

@section('content')
<div class="card card-row card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            HOME
        </h3>
    </div>
    <div class="card-body">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h5 class="card-title">自分の日報（最近の3件）</h5>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div>
                        <tbody>
                            @forelse ($reports as $report)
                            <tr>
                                <td>{{ $report->date }}</td>
                                <td>{{ $report->start_time }}</td>
                                <td>{{ $report->end_time }}</td>
                                <td>{{ $report->location }}</td>
                                <td>{{ $report->workDescription }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">今日のスケジュールはありません。</td>
                            </tr>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title">今日の予定</h5>
            </div>
            <div class="card-body">
            <table>
                <tbody>
                    @forelse($todaySchedules as $todaySchedule)
                        <tr>
                            <td>・{{ $todaySchedule->event_name }}</td>
                        </tr>
                    @empty
                        <p>今日の予定はありません。</p>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title">明日の予定</h5>
            </div>
            <div class="card-body">
            <table>
                <tbody>
                    @forelse($tomorrowSchedules as $tomorrowSchedule)
                        <tr>
                            <td>・{{ $tomorrowSchedule->event_name }}</td>
                        </tr>
                    @empty
                        <p>明日の予定はありません。</p>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop