@extends('layouts.main')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Новосто по категории</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus rerum velit. Eum, ipsam, unde.</p>

            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse($newsList as $news)
                    <div class="col">
                        <div class="card shadow-sm">
                            @if($news->image==null)
                                <img src="https://is5-ssl.mzstatic.com/image/thumb/Music128/v4/e3/fa/1b/e3fa1b91-bd3f-67c1-6e62-135e6519d5f9/source/500x500bb.jpg" style="width:200px;">
                            @else
                                <img src="{{Storage::url($news->image)}}" style="width:200px;" alt="image">
                            @endif

                            <div class="card-body">
                                <strong>
                                    <a href="{{ route('infonews.show', ["id"=>$news->id]) }}">{{ $news->title }}</a>
                                </strong>
                                <p class="card-text"> {!! $news->short_description !!} </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('infonews.show', ['id'=> $news->id]) }}"
                                           class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                    </div>
                                    <small class="text-muted"><strong>Автор:</strong> {{ $news->author }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>Новостей нет!</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
