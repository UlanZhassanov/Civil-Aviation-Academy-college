@php
use App\Models\User;

$worker_permission = User::find(Auth::user()->id)->workersPermissions;
$worker_permission = unserialize($worker_permission->permission);
@endphp
<div class='dropdown'>
    <div class='parrent title @if ($parrentCat === 'Управление книгами') active @endif'>
        <i class="fa fa-book"></i>
        Книги
        <i class="fa fa-angle-right @if ($parrentCat === 'Управление книгами') rotate-90 @endif'"></i>
    </div>
    <div class='menu @if ($parrentCat === 'Управление книгами') active @else hide @endif'>
        @if (isset($worker_permission->books->read) && $worker_permission->books->read == true)
            <a href="{{ route('admin.website.books.index') }}" @if ($active_menu === 'Новые книги') class="active" @endif>
                Новые книги
            </a>
        @endif
        @if (isset($worker_permission->books->read) && $worker_permission->books->read == true)
            <a href="{{ route('admin.website.book_collection.index') }}"
                @if ($active_menu === 'Подборка книг') class="active" @endif>
                Подборка книг
            </a>
        @endif
        {{-- @if (isset($worker_permission->books->read) && $worker_permission->books->read == true)
            <a href="{{ route('admin.website.library_navigation.index') }}"
                @if ($active_menu === 'Меню библиотеки') class="active" @endif>
                Меню библиотеки
            </a>
        @endif --}}
        @if (isset($worker_permission->books->read) && $worker_permission->books->read == true)
            <a href="{{ route('admin.website.library_pages.index') }}"
                @if ($active_menu === 'Страницы библиотеки') class="active" @endif>
                Страницы библиотеки
            </a>
        @endif
        @if (isset($worker_permission->books->read) && $worker_permission->books->read == true)
            <a href="{{ route('admin.website.library_news.index') }}"
                @if ($active_menu === 'Новости библиотеки') class="active" @endif>
                Новости библиотеки
            </a>
        @endif
    </div>
</div>
