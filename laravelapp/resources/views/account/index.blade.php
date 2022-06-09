@extends('layouts.app')
@section('content')
    <h1> Добро пожаловать, {{Auth::user()->name}}</h1>
    <br>
    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" style="width: 200px; border-radius: 30%">
        <br>
    @endif
    @if(Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}">В админку</a>
    @endif
@endsection
