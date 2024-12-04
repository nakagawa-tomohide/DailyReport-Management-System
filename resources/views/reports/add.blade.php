@extends('adminlte::page')

@section('title', '日報登録')

@section('content_header')
    <h1>日報登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="location">場所</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="場所">
                        </div>

                        <div class="form-group">
                            <label for="machine">機械</label>
                            <input type="text" class="form-control" id="machine" name="machine" placeholder="機械">
                        </div>

                        <div class="form-group">
                            <label for="fuel">燃料使用量</label>
                            <input type="text" class="form-control" id="fuel" name="fuel" placeholder="燃料使用量">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop