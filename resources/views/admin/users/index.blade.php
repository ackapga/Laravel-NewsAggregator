@extends('layouts.admin')

@section('content')

    <div
        class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Пользователей</h1>
        <p style="margin-left: 15%; padding: 10px; background-color: #0d6efd; color: white; border-radius: 15px">Общее
            количество категорий: {{ $number }}</p>
        <div style="position: absolute; width: 80%">
            @include('inc.message')
        </div>
    </div>

    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Откуда</th>
                <th scope="col">Admin</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Последний визит</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr style="border-left: 1px solid #dde1e5; border-right: 1px solid #dde1e5">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->from }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->last_login_at }}</td>
                    <th scope="col" style="display: flex">
                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Редактор</button>
                        </a>
                        &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $user->id }}">
                            <button type="button" class="btn btn-danger btn-sm">Удалить</button>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

@endsection

@push('js')
    <script text="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (e, k) {
                e.addEventListener("click", function (){
                    const id = e.getAttribute('rel');
                    if(confirm(`Подтверждаете удаление пользователя: ${id}`)) {
                        send(`/admin/users/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Удаление отменено")
                    }
                })
            })
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
