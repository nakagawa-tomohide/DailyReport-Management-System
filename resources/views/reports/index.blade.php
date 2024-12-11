@extends('adminlte::page')

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
                                <a href="{{ url('reports/add') }}" class="btn btn-default">日報登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="reportList">
                        <thead>
                            <tr>
                                <th>月/日</th>
                                <th>名前</th>
                                <th>場所</th>
                                <th>機械</th>
                                <th>燃料使用量（L）</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->created_at }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->location }}</td>
                                    <td>{{ $report->machine }}</td>
                                    <td>{{ $report->fuel }}</td>
                                    <td class="edit-delete-btn">
                                        @if(Auth::user()->can('view', $report))
                                            <button class="btn btn-info editBtn" data-id="{{ $report->id }}">編集</button>
                                            <button class="btn btn-danger deleteBtn" data-id="{{ $report->id }}">削除</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- モーダル画面 -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">編集</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="editForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="reportId">
                        <div class="mb-3">
                            <label for="reportName" class="form-label">名前</label>
                            <input type="text" class="form-control" id="reportName">
                        </div>
                        <div class="mb-3">
                            <label for="reportLocation" class="form-label">場所</label>
                            <input type="text" class="form-control" id="reportLocation">
                        </div>
                        <div class="mb-3">
                            <label for="reportMachine" class="form-label">機械</label>
                            <input type="text" class="form-control" id="reportMachine">
                        </div>
                        <div class="mb-3">
                            <label for="reportFuel" class="form-label">燃料使用量（L）</label>
                            <input type="text" class="form-control" id="reportFuel">
                        </div>
                        <div class="modal-btn">
                            <button type="button" class="btn btn-info" id="saveChanges">保存</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                        </div>
                    </form>
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
