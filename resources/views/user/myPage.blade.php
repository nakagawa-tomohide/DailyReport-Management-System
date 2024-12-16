@extends('adminlte::page')

@section('title', 'マイページ')

@section('content_header')
    <h1>マイページ</h1>
@stop

@section('content')
    <div class="row myPage-wrapper">
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
                @if (session('message'))
                <div class="alert alert-info" role="alert">
                    {{ session('message') }}
                </div>
                @endif

                <form action="{{ route('myEdit') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="location">メールアドレス</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">更新</button>
                    </div>
                    <div class="password-reset">
                        <a href="/password/reset">パスワードを変更する</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('js')
@stop
