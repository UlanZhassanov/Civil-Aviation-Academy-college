@php
use App\Models\WorkersInfo;

$worker_info = WorkersInfo::select('surname', 'name', 'patronymic',)->where('user_id', Auth::user()->id)->first();
@endphp
<div class="right-sidebar col-md-10">
    <div class="right-sidebar__top-line">
        <h3>
            Добро пожаловать
            {!! $worker_info->surname !!} {!! $worker_info->name !!}
            @if (isset($worker_info->patronimyc))
                {!! $worker_info->patronimyc !!}
            @endif
        </h3>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Выйти') }}
        </a>
        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
            @csrf
        </form>
    </div>
    <main>
        @yield('content')
    </main>
</div>
