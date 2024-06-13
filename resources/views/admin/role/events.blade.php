<div class='dropdown'>
    <div class='parrent title @if ($parrentCat === 'Управление событиями') active @endif'>
        <i class="far fa-newspaper"></i>
        Новости и события
        <i class="fa fa-angle-right @if ($parrentCat === 'Управление событиями') rotate-90 @endif'"></i>
    </div>
    <div class='menu @if ($parrentCat === 'Управление событиями') active @else hide @endif'>
		  <a href="{{ route('admin.website.events.index') }}" @if ($active_menu === 'События') class="active" @endif>
            События
        </a>
    </div>
</div>
