{{-- layouts/layout.blade.phpを読み込む --}}
@extends('layouts.layout')


{{-- layout.blade.phpの@yield('title')に'todoの新規作成'を埋め込む --}}
@section('title', 'todoの新規作成')

{{-- layout.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>todo新規作成</h2>
            </div>
        </div>
    </div>
@endsection