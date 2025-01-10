@extends('common.adminlte.page')

@section('title', '日報一覧')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content_header')
    <h1>日報一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">日報一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a class="btn btn-default addBtn">日報登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="reportList">
                        <thead>
                            <tr>
                                <th>日付</th>
                                <th>名前</th>
                                <th>作業場所</th>
                                <th>作業内容</th>
                                <th>使用機械</th>
                                <th>燃料使用量（L）</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->date }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->location }}</td>
                                    <td>{{ $report->workDescription }}</td>
                                    <td>{{ $report->machine }}</td>
                                    <td>{{ $report->fuel }}</td>
                                    <td class="edit-delete-btn">
                                        <button class="btn btn-info editBtn" data-id="{{ $report->id }}">編集</button>
                                        <button class="btn btn-danger deleteBtn" data-id="{{ $report->id }}">削除</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/js/script.js') }}"></script>
@stop