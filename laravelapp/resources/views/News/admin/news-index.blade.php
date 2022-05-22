@extends('layouts.admin')
@section('content')
    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus rerum velit. Eum, ipsam, unde.</p>
    <p>
        <a href="{{route("admin.news.create")}}" class="btn btn-primary my-2">Добавить новость</a>
        {{--<a href="#" class="btn btn-secondary my-2">Удалить новость</a>--}}
    </p>
@endsection
