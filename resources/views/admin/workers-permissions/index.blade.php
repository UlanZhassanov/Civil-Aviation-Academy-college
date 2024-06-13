@extends('admin.layouts.app')
@php $parrentCat  = 'Управление работниками' @endphp
@php $active_menu  = 'Доступы работников' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Доступы работников</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__content">
                <div class="pages__page thead">
                    <p style="width: 40%">Ф.И.О.</p>
                    <p style="width: 10%" class="text-center">ИИН</p>
                    <p style="width: 15%" class="text-center">Отдел</p>
                    <p style="width: 20%" class="text-center">Должность</p>
                    <p style="width: 15%" class="text-right">Редактирование доступа</p>
                </div>
                @foreach ($users as $user)
                    <div class="pages__page">
                        <p style="width: 40%">{!! $user->surname !!} {!! $user->name !!} {!! $user->patronymic !!}</p>
                        <p style="width: 10%" class="text-center">{!! $user->iin !!}</p>
                        <p style="width: 15%" class="text-center">{!! $user->department !!}</p>
                        <p style="width: 20%" class="text-center">{!! $user->position !!}</p>
                        @if ($user->permission == null)
                            <p style="width: 15%" class="text-right">
                                <a href="{{ route('admin.workers-permissions.create') }}" class="btn btn-primary">
                                    Добавить доступы
                                </a>
                            </p>
                        @else
                            <p style="width: 15%" class="text-right">
                                <a href="{{ route('admin.workers-permissions.show', $user->id) }}"
                                    class="btn btn-primary">
                                    Редактировать доступы
                                </a>
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
