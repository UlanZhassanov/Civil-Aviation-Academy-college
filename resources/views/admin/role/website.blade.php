@php
use App\Models\User;

$worker_permission = User::find(Auth::user()->id)->workersPermissions;
$worker_permission = unserialize($worker_permission->permission);
@endphp

<div class='dropdown'>
    <div class='parrent title @if ($parrentCat === 'Управление сайтом') active @endif'>
        <i class="fas fa-cogs"></i>
        Управление сайтом
        <i class="fa fa-angle-right @if ($parrentCat === 'Управление сайтом') rotate-90 @endif'"></i>
    </div>
    <div class='menu @if ($parrentCat === 'Управление сайтом') active @else hide @endif'>
        @if ($worker_permission->navigation->read == true)
        <a href="{{ route('admin.website.navigation.index') }}"
            @if ($active_menu === 'Меню') class="active" @endif>
            Навигация
        </a>
        @endif

        @if ($worker_permission->pages->read == true)
        <a href="{{ route('admin.website.pages.index') }}" @if ($active_menu === 'Страницы') class="active" @endif>
            Страницы
        </a>
        <a href="{{ route('admin.website.department-page.index') }}"
            @if ($active_menu === 'Страницы кафедр') class="active" @endif>
            Страницы кафедр
        </a>
        @endif

        @if ($worker_permission->department->read == true)
            <a href="{{ route('admin.website.department.index') }}"
                @if ($active_menu === 'Кафедры') class="active" @endif>
                Кафедры
            </a>
            <a href="{{ route('admin.department.teacher.index') }}"
                @if ($active_menu === 'Преподаватели кафедр') class="active" @endif>
                Преподаватели кафедр
            </a>
        @endif
    </div>
</div>
