@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать источника</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="table-responsive">

        <h3>Форма редактирования источника</h3>
        @include('inc.messages')
        <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Имя</label>
                <input type="text" id="user_name" name="user_name" class="form-control" value="{{ $source->user_name }}">
            </div>
            <div class="form-group">
                <label for="title">email</label>
                <input type="text" id="user_email" name="user_email" class="form-control" value="{{ $source->user_email }}">
            </div>
            <div class="form-group">
                <label for="title">Url</label>
                <input type="text" id="url" name="url" class="form-control" value="{{ $source->url}}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
