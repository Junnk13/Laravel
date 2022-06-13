@extends('layouts.main')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Новости</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus
                    rerum velit. Eum, ipsam, unde.</p>
                <p>
                    <a href="{{route("infonews.category")}}" class="btn btn-primary my-2">Категории новостей</a>

                </p>
            </div>
        </div>
        <div style="max-width: 50%; margin: 0 auto">
            <h3>Форма обратной связи</h3>
            @include('inc.messages')
            <form method="post" action="{{ route('infonews.comment.store') }}" style="margin-bottom: 40px">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ваше имя</label>
                    <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1"
                           placeholder="Введи Ваше имя" value="{{ old('user_name') }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Текст сообщения</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                              rows="3">{!! old('message') !!}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Отправить</button>
                </div>
            </form>
        </div>
    </section>
    {{--<a href="{{route("news.category")}}"><h3>Категории новостей</h3></a>--}}
@endsection
