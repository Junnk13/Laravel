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
                        <a href="javascript:;" style="color:red; font-size: 12px;" class="delete" rel="{{ $newsItem->id }}">Уд.</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $news->links() }}
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const element = document.querySelectorAll(".delete");
            element.forEach(function (value, key) {
                value.addEventListener("click", function () {
                    const id = this.getAttribute("rel");
                    if (confirm("Вы хотите удалить запись ?")) {
                        send('/admin/news/' + id).then(() => {
                            location.reload();
                        })
                    }
                })
            })
        });

        async function send(url) {
            let response = await fetch(url, {
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = response.json();
            return result.ok;
        }
    </script>
@endpush
