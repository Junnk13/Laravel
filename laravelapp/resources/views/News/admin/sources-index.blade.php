@extends('layouts.admin')
@section('content')
    <h1>Список источников</h1>
    <p>
        <a href="{{route("admin.sources.create")}}" class="btn btn-primary my-2">Добавить источник</a>
        <a href="{{route("admin.parser")}}" class="btn btn-primary my-2">Спарсить новости</a>
    </p>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Имя пользователя</th>
                <th scope="col">email</th>
                <th scope="col">Url</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sources as $sourceItem)
                <tr>
                    <td>{{ $sourceItem->id }}</td>
                    <td>{{ $sourceItem->user_name }}</td>
                    <td>{{ $sourceItem->user_email }}</td>
                    <td>{{ $sourceItem->url }}</td>
                    <td>{{ $sourceItem->created_at }}</td>
                    <td><a href="{{ route('admin.sources.edit', ['source' => $sourceItem->id]) }}"
                           style="font-size: 12px;">Ред.</a> &nbsp;
                        <a href="javascript:;" style="color:red; font-size: 12px;" class="delete" rel="{{ $sourceItem->id }}">Уд.</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $sources->links() }}
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
                        send('/admin/sources/' + id).then(() => {
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
