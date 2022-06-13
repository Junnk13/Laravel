@extends('layouts.admin')
@section('content')
    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus rerum velit.
        Eum, ipsam, unde.</p>
    <p>

    </p>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Имя</th>
                <th scope="col">почта</th>
                <th scope="col">права админа</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if( $user->is_admin == 1 )
                        <td>Да</td>
                    @else
                        <td>Нет</td>
                    @endif
                    <td><a href="{{route('admin.profile.edit', ['profile' => $user]) }}"
                           style="font-size: 12px;">Ред.</a> &nbsp;
                        <a href="javascript:;" style="color:red; font-size: 12px;" class="delete" rel="{{ $user->id }}">Уд.</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
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
                        send('/admin/profile/' + id).then(() => {
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
                },
            });
            let result = response.json();
            return result.ok;
        }
    </script>
@endpush
