@extends('layouts.app')
@section('content')
    <h1> Добро пожаловать, {{Auth::user()->name}}</h1>
    <br>
    @if(Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}">В админку</a>
    @endif
@endsection
