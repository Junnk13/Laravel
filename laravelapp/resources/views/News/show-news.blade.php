@extends('layouts.main')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$news["title"]}}</h1>
                <img src="{{$news["img"] }}">
                <p class="lead text-muted">{{$news["desc"]}}</p>
                <p>
                    <small class="text-muted"><strong>Автор:</strong> {{ $news['author'] }}</small>
                    <small class="text-muted"><strong>Автор:</strong> {{ $news['date_create'] }}</small>
                </p>
            </div>
        </div>
    </section>
@endsection

