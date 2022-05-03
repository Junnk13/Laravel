@extends('layouts.admin')
@section('content')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Тема новости</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="тема новости">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Текст новости</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
    <label for="formFileMultiple" class="form-label">Загрузите изображение</label>
    <input class="form-control" type="file" id="formFileMultiple" >
</div>
<div class="col-12">
    <button type="submit" class="btn btn-primary">Опубликовать</button>
</div>
@endsection
