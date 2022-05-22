@extends('layouts.admin')
@section('content')
    <h3>Форма загрузки новстей</h3>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Тема новости</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="тема новости" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Автор новости</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="автор новости" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Текст новости</label>
            <textarea class="form-control" name="newsText" id="exampleFormControlTextarea1" rows="3">{!! old('news-text') !!}</textarea>
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Загрузите изображение</label>
            <input class="form-control" name="image" type="file" id="formFileMultiple">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </div>
    </form>
@endsection
