@extends('layouts.admin')
@section('content')
<div style="max-width: 50%; margin: 0 auto">
    <h3 style="text-align: center">Форма заказа на получение выгрузки данных</h3>
    @include('inc.messages')
    <form method="post" action="{{ route('admin.sources.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ваше имя</label>
            <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1"
                   placeholder="Введи Ваше имя" value="{{ old('user_name_url') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ваш email</label>
            <input type="email" name="user_email" class="form-control" id="exampleFormControlInput1"
                   placeholder="Введи Ваш email" value="{{ old('user_emal') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Url</label>
            <input type="text" name="url" class="form-control" id="exampleFormControlInput1"
                   placeholder="Введи url" value="{{ old('user_url') }}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Отправить</button>
        </div>
    </form>
</div>
@endsection
