@extends('common.adminlte.page')

@section('title', 'Dashboard')

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
                <h5 class="card-title">今日の日報提出者</h5>
            </div>
            <div class="card-body">
                <table>
                    <tbody>
                        @forelse ($reports as $report)
                            <tr>
                                <td>・{{ $report->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>まだいません。</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title">今日の予定</h5>
            </div>
            <div class="card-body">
                <table>
                    <tbody>
                        @forelse ($todaySchedules as $todaySchedule)
                            <tr>
                                <td>・{{ $todaySchedule->event_name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>今日の予定はありません。</td>
                            </tr>
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
                        @forelse ($tomorrowSchedules as $tomorrowSchedule)
                            <tr>
                                <td>・{{ $tomorrowSchedule->event_name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>明日の予定はありません。</td>
                            </tr>
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
@stop

@section('js')

@stop