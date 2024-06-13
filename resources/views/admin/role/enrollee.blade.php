<div class='dropdown'>
    <div class='parrent title @if ($parrentCat === 'Абитуриенты') active @endif'>
        <i class="fas fa-user-tie"></i>
        Абитуриенты
        <i class="fa fa-angle-right @if ($parrentCat === 'Абитуриенты') rotate-90 @endif'"></i>
    </div>
    <div class='menu @if ($parrentCat === 'Абитуриенты') active @else hide @endif'>
        <a href="{{ route('admin.enrollee.bachelor.index') }}" @if ($active_menu === 'Бакалавриат') class="active" @endif>
            Бакалавриат
        </a>
        <a href="{{ route('admin.enrollee.master.index') }}" @if ($active_menu === 'Магистратура') class="active" @endif>
            Магистратура
        </a>
        <a href="{{ route('admin.enrollee.doctoral.index') }}" @if ($active_menu === 'Докторантура') class="active" @endif>
            Докторантура
        </a>
        <a href="{{ route('admin.enrollee.greport.index') }}" @if ($active_menu === 'Общий отчёт') class="active" @endif>
            Общий отчёт
        </a>
        <a href="{{ route('admin.enrollee.rreport.index') }}" @if ($active_menu === 'Отчёт по приёму') class="active" @endif>
            Отчёт по приёму
        </a>
        <a href="{{ route('admin.enrollee.deleted.index') }}" @if ($active_menu === 'Удалённые') class="active" @endif>
            Удалённые
        </a>
        <a href="{{ route('admin.enrollee.documents.index') }}" @if ($active_menu === 'Документы') class="active" @endif>
            Документы
        </a>
    </div>
</div>
