@extends('layouts.admin')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Пользователей</h1>
    </div>

    <div class="table-responsive">

        @include('inc.message')

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

            @forelse($users as $user)
                <tr>
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

            @empty

                <tr>
                    <td colspan="7">Записи не найдены!</td>
                </tr>

            @endforelse

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
