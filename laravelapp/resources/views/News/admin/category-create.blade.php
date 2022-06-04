@extends('layouts.admin')
@section('content')
    <h3>Форма загрузки новстей</h3>
    @include('inc.messages')
    <form method="post" action="{{ route('admin.category.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Тема новости</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="тема новости" value="{{ old('title') }}">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </div>
    </form>
@endsection
