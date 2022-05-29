@extends('layouts.admin')
@section('content')
    <h1>Список источников</h1>
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
            @foreach($sourses as $sourseItem)
                <tr>
                    <td>{{ $sourseItem->id }}</td>
                    <td>{{ $sourseItem->user_name }}</td>
                    <td>{{ $sourseItem->user_email }}</td>
                    <td>{{ $sourseItem->url }}</td>
                    <td>{{ $sourseItem->created_at }}</td>
                    <td><a href="{{ route('admin.sourses.edit', ['sourse' => $sourseItem->id]) }}"
                           style="font-size: 12px;">Ред.</a> &nbsp;
                        <a href="javascript:;" style="color:red; font-size: 12px;">Уд.</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $sourses->links() }}
    </div>
@endsection
