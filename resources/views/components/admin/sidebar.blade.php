<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.resources.index')) active @endif" aria-current="page"
                   href="{{ route('admin.resources.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Панель управление
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif"
                   href="{{ route('admin.categories.index') }}">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Категорий
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif"
                   href="{{ route('admin.news.index') }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif"
                   href="{{ route('admin.users.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Пользователи
                </a>
            </li>
        </ul>

        <style>
            .plus {
                color: grey;
                margin-left: 90%;
            }

            .plus:hover {
                color: green;
            }

            .notes {
                display: flex;
                justify-content: space-between;
                margin-right: 10%
            }

            .updateNotes {
                color: #595959;
                text-decoration: none;
                margin-right: 10px;
            }

            .updateNotes:hover {
                color: #4646ff;
            }

            .deleteNotes {
                color: #595959;
            }

            .deleteNotes:hover {
                color: #ff0000;
            }

        </style>

        <h6 class="d-flex align-items-center px-3 mt-4 mb-3 text-muted text-uppercase">
            <span>Добавить заметку</span>
            <a class="link-secondary" href="{{ route('admin.notes.create') }}" aria-label="Add a new report">
                <span data-feather="plus-square" class="plus"></span>
            </a>
        </h6>

        <ul class="nav flex-column">
            @foreach($notes as $note)
                <div class="notes">

                    <a class="nav-link" href="{{ route('admin.notes.show', [$note->id]) }}">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        {{ $note->title }}
                    </a>

                    <div style="display: flex">
                        <a href="{{ route('admin.notes.edit', [$note->id]) }}">
                            <span data-feather="edit" class="updateNotes"></span></a>

                        <form method="post" action={{ route('admin.notes.destroy', [$note->id]) }}>
                            @csrf
                            @method('DELETE')
                            <button style="border: none; background: none" onclick="deleteAsk()">
                                <span data-feather="trash-2" class="deleteNotes"></span>
                            </button>


                        </form>

                    </div>

                </div>

                <hr style="margin: 0">
            @endforeach
        </ul>

    </div>
</nav>

<script>
    function deleteAsk() {
        confirm('Вы уверены что хотите удалить заметку?.')
    }
</script>
