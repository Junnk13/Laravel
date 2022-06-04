@extends('layouts.admin')
@section('content')
    <h3>Форма загрузки новстей</h3>
    @include('inc.messages')
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Тема новости</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="тема новости" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($category->id === old('category_id')) selected @endif
                    >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Автор новости</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="автор новости" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Текст новости</label>
            <textarea class="form-control" name="full_description" id="exampleFormControlTextarea1" rows="3">{!! old('full_description') !!}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Краткое описание</label>
            <textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3">{!! old('short_description') !!}</textarea>
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Загрузите изображение</label>
            <input class="form-control" name="image" type="file" id="formFileMultiple">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status') === 'HIDE') selected @endif>HIDE</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </div>
    </form>
@endsection
