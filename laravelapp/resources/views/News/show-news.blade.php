@extends('layouts.main')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$news->title}}</h1>
                @if($news->image==null)
                    <img src="https://is5-ssl.mzstatic.com/image/thumb/Music128/v4/e3/fa/1b/e3fa1b91-bd3f-67c1-6e62-135e6519d5f9/source/500x500bb.jpg">
                @else
                <img src="{{$news->image}}" alt="image">
                @endif
                <p class="lead text-muted">{{$news->full_description}}</p>
                <p>
                    <small class="text-muted"><strong>Автор:</strong> {{ $news->author }}</small>
                    <small class="text-muted"><strong>Дата публикации:</strong> {{ $news->created_at }}</small>
                </p>
            </div>
        </div>
    </section>
@endsection

