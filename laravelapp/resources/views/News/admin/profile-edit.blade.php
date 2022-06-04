@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать профиля</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="table-responsive">

        <h3>Форма редактирования новости</h3>
        @include('inc.messages')
        <form method="post" action="{{ route('admin.profile.update', ['profile' => $profile]) }}">
            @csrf
            @method('put')
            @if(Session::has('MSG'))
                <div class="alert alert-success">
                    {{Session::get("MSG")}}
                </div>
            @endif
            <div class="form-group">
                <label for="title">ID</label>
                <p>{{ $profile->id }}</p>
            </div>
            <div class="form-group">
                <label for="title">Имя</label>
                <input type="text" id="title" name="name" class="form-control" value="{{ $profile->name }}">
            </div>
            <div class="form-group">
                <label for="title">Почта</label>
                <input type="text" id="short_description" name="email" class="form-control"
                       value="{{ $profile->email }}">
            </div>
            @if($errors->has('password'))
                @foreach($errors->get('password') as $error)
                    <p>{{$error}}</p>
        @endforeach
    </div>
    @endif
    <div class="form-group">
        <label for="title">Текущий пароль</label>
        <input type="text" id="short_description" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Новый пароль</label>
        <input type="text" id="short_description" name="new_password" class="form-control" placeholder="new password">
    </div>
    <div class="form-group">
        <label for="title">Права админа</label>

        <select class="form-control" name="is_admin" id="is_admin">
            <option @if($profile->is_admin === false) selected @endif value="0">Нет</option>
            <option @if($profile->is_admin === true) selected @endif value="1">Да</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
    </div>
@endsection
