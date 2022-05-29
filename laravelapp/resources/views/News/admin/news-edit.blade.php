@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="table-responsive">

        <h3>Форма редактирования новости</h3>

        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <label for="title">Описание</label>
                <input type="text" id="short_description" name="short_description" class="form-control" value="{{ $news->short_description }}">
            </div>
            <div class="form-group">
                <label for="title">Полное описание</label>
                <input type="text" id="full_description" name="full_description" class="form-control" value="{{ $news->full_description }}">
            </div>
            <div class="form-group">
                <label for="title">Статус</label>

                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'HIDE') selected @endif>HIDE</option>
                </select>
            </div>
            <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($category->id === $news->category_id) selected @endif
                    >{{ $category->title }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="title">Автор</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ $news->author }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
