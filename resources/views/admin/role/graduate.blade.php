<div class='dropdown'>
    <div class='parrent title @if ($parrentCat === 'Выпускники') active @endif'>
        <i class="fas fa-user-graduate"></i>
        Выпускники
        <i class="fa fa-angle-right @if ($parrentCat === 'Выпускники') rotate-90 @endif'"></i>
    </div>
    <div class='menu @if ($parrentCat === 'Выпускники') active @else hide @endif'>
        <a href="{{ route('admin.graduate.graduates.index') }}" @if ($active_menu === 'Все(2021)') class="active" @endif>
            Все(2021)
        </a>
        <a href="{{ route('admin.graduate.report.index') }}" @if ($active_menu === 'Отчёт выпускники (2021)') class="active" @endif>
            Отчёт(2021)
        </a>
        <a href="{{ route('admin.graduate.graduates.create') }}" @if ($active_menu === 'Добавление выпускников (2021)') class="active" @endif>
            Добавление(2021)
        </a>
        <a href="{{ route('admin.graduate.graduates.index_new') }}" @if ($active_menu === 'Все') class="active" @endif>
            Все
        </a>
        <a href="{{ route('admin.graduate.report.index_new') }}" @if ($active_menu === 'Отчёт выпускники') class="active" @endif>
            Отчёт
        </a>
        <a href="{{ route('admin.graduate.graduates.create_new') }}" @if ($active_menu === 'Добавление выпускников') class="active" @endif>
            Добавление
        </a>
    </div>
</div>
