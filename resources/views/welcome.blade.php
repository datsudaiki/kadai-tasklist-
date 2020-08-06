@extends('layouts.app')


@section('content')
    @if (Auth::check())
        @include('tasks.index')
        
        <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('tasks.form')
                {{-- 投稿一覧 --}}
                @include('tasks.tasks')
            </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasks</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection