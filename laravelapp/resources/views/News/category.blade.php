@extends('layouts.main')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Категории новостей</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus rerum velit. Eum, ipsam, unde.</p>
                <p>
                    @foreach ($categoryList as $category)
                        <a href="{{route("infonews.newsList", ["idCategory"=>$category->id])}}" class="btn btn-secondary my-2">{{ $category->title }}</a>

                    @endforeach
                          </p>
            </div>
        </div>
    </section>
@endsection
