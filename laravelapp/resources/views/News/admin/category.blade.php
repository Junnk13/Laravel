@extends('layouts.admin')
@section('content')
    <h1>Список категорий</h1>
    @forelse($categories as $category)
        {{$category->id}} - {{$category->title}} - {{$category->created_at}}<br>
    @empty
        Записей нет
    @endforelse
@endsection
