@extends('layouts.main')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Новости</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus rerum velit. Eum, ipsam, unde.</p>
                <p>
                    <a href="{{route("news.category")}}" class="btn btn-primary my-2">Категории новостей</a>
                   {{-- <a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
                </p>
            </div>
        </div>
    </section>
{{--<a href="{{route("news.category")}}"><h3>Категории новостей</h3></a>--}}
@endsection
