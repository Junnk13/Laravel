@extends('layouts.admin')
@section('content')
    <h1>Список категорий</h1>
    <p>
        <a href="{{route("admin.category.create")}}" class="btn btn-primary my-2">Добавить категорию</a>
        {{--<a href="#" class="btn btn-secondary my-2">Удалить новость</a>--}}
    </p>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Наименование</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.category.edit', ['category' => $category->id]) }}" style="font-size: 12px;">Ред.</a> &nbsp;
                        <a href="javascript:;" style="color:red; font-size: 12px;">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
@endsection
