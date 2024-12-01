@extends('adminlte::page')

@section('title', '商品一覧')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td class="edit-btn"><button class="btn btn-info editBtn" data-id="{{ $item->id }}">編集</button></td>
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
                    <form action="editForm" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="itemId">
                        <div class="mb-3">
                            <label for="itemName" class="form-label">商品名</label>
                            <input type="text" class="form-control" id="itemName">
                        </div>
                        <div class="mb-3">
                            <label for="itemType" class="form-label">種別</label>
                            <input type="text" class="form-control" id="itemType" >
                        </div>
                        <div class="mb-3">
                            <label for="itemDetail" class="form-label">詳細</label>
                            <input type="text" class="form-control" id="itemDetail">
                        </div>
                        <button type="button" class="btn btn-primary" id="saveChanges">保存</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
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
