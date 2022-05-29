@extends('layouts.admin')
@section('content')
    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus rerum velit.
        Eum, ipsam, unde.</p>
    <p>
        <a href="{{route("admin.news.create")}}" class="btn btn-primary my-2">Добавить новость</a>
        {{--<a href="#" class="btn btn-secondary my-2">Удалить новость</a>--}}
    </p>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Категория</th>
                <th scope="col">Наименование</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>{{ $newsItem->category->title }}</td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->author }}</td>
                    <td>{{ $newsItem->status }}</td>
                    <td>{{ $newsItem->created_at }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $newsItem]) }}"
                           style="font-size: 12px;">Ред.</a> &nbsp;
                        <a href="javascript:;" style="color:red; font-size: 12px;">Уд.</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $news->links() }}
    </div>
@endsection
