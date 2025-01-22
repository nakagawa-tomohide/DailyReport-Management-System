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
        {{ $reports->links() }}
    </div>
    <!-- 編集モーダル画面 -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">編集</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="editForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="reportId">
                        <div class="mb-3">
                            <label for="reportDate" class="form-label">日付</label>
                            <input type="text" class="form-control" id="reportDate">
                            <div id="error-date" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportName" class="form-label">名前</label>
                            <input type="text" class="form-control" id="reportName">
                            <div id="error-name" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportLocation" class="form-label">作業場所</label>
                            <input type="text" class="form-control" id="reportLocation">
                            <div id="error-location" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportWorkDescription" class="form-label">作業内容</label>
                            <input type="text" class="form-control" id="reportWorkDescription">
                            <div id="error-workDescription" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportMachine" class="form-label">使用機械</label>
                            <input type="text" class="form-control" id="reportMachine">
                            <div id="error-machine" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportFuel" class="form-label">燃料使用量（L）</label>
                            <input type="text" class="form-control" id="reportFuel">
                            <div id="error-fuel" class="error-message"></div>
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
    <!-- 登録モーダル -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">登録</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="addForm">
                        @csrf
                        <div class="mb-3">
                            <label for="reportDate" class="form-label">日付</label>
                            <input type="date" max="9999-12-31" class="form-control" id="addReportDate">
                            <div id="error-date" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportName" class="form-label">名前</label>
                            <input type="text" class="form-control" id="addReportName" value="{{ Auth::user()->name }}">
                            <div id="error-name" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportLocation" class="form-label">作業場所</label>
                            <input type="text" class="form-control" id="addReportLocation">
                            <div id="error-location" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportWorkDescription" class="form-label">作業内容</label>
                            <input type="text" class="form-control" id="addReportWorkDescription">
                            <div id="error-workDescription" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportMachine" class="form-label">使用機械</label>
                            <input type="text" class="form-control" id="addReportMachine">
                            <div id="error-machine" class="error-message"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reportFuel" class="form-label">燃料使用量（L）</label>
                            <input type="text" class="form-control" id="addReportFuel">
                            <div id="error-fuel" class="error-message"></div>
                        </div>
                        <div class="modal-btn">
                            <button type="button" class="btn btn-info" id="add">登録</button>
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
