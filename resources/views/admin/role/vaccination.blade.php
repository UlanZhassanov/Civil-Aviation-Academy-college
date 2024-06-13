<div class='dropdown'>
    <div class='parrent title @if ($parrentCat === 'Вакцинация') active @endif'>
        <i class="fas fa-syringe"></i>
        Вакцинация
        <i class="fa fa-angle-right @if ($parrentCat === 'Вакцинация' ) rotate-90 @endif'"></i>
    </div>
    <div class='menu @if ($parrentCat === 'Вакцинация') active @else hide @endif'>
        <a href="{{ route('admin.vaccination.create') }}" @if ($active_menu === 'Добавление') class="active" @endif>
				Добавление
        </a>
    </div>
</div>
