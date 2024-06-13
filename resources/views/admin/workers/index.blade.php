@extends('admin.layouts.app')
@php $parrentCat  = 'Управление работниками' @endphp
@php $active_menu  = 'Работники' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Управление работниками</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__content">
                <div class="pages__page thead">
                    {{-- <p style="width: 5%">#</p> --}}
                    <p style="width: 40%">Ф.И.О.</p>
                    <p style="width: 10%" class="text-center">ИИН</p>
                    <p style="width: 15%" class="text-center">Отдел</p>
                    <p style="width: 20%" class="text-center">Должность</p>
                    <p style="width: 15%" class="text-right">Редактирование данных</p>
                </div>
                @foreach ($users as $user)
                    {{-- @php
                        $user_permission = unserialize($user->permision);
                    @endphp --}}
                    <div class="pages__page">
                        {{-- <p style="width: 5%">{!! $user->id !!}</p> --}}
                        <p style="width: 40%">{!! $user->surname !!} {!! $user->name !!} {!! $user->patronymic !!}</p>
                        <p style="width: 10%" class="text-center">{!! $user->iin !!}</p>
                        <p style="width: 15%" class="text-center">{!! $user->department !!}</p>
                        <p style="width: 20%" class="text-center">{!! $user->position !!}</p>
                        <p style="width: 15%" class="text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#editModalItem{!! $user->id !!}">
                                Редактировать данные
                            </button>
                        </p>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editModalItem{!! $user->id !!}"" tabindex=" -1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 style="text-align: center">Редактирование данных</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.workers.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="iin" value="{!! $user->iin !!}">
                                        <div class="d-flex flex-wrap mb-4">
                                            <div class="col-md-4 mb-2 pl-0">
                                                <label>Фамилия</label>
                                                <input class="form-control" type="text" value="{!! $user->surname !!}"
                                                    disabled>
                                            </div>
                                            <div class="col-md-4 mb-2 pl-1">
                                                <label>Имя</label>
                                                <input class="form-control" type="text" value="{!! $user->surname !!}"
                                                    disabled>
                                            </div>
                                            <div class="col-md-4 mb-2 pl-1">
                                                <label>Отчество</label>
                                                <input class="form-control" type="text"
                                                    @if (isset($user->patronymic)) value="{!! $user->patronymic !!}" @endif
                                                    disabled>
                                            </div>
                                            <div class="col-md-4 mb-2 pl-0">
                                                <label>ИИН</label>
                                                <input class="form-control" type="text" value="{!! $user->iin !!}"
                                                    disabled>
                                            </div>
                                            <div class="col-md-4 mb-2 pl-1">
                                                <label>Пароль</label>
                                                <input class="form-control" type="password" placeholder="Пароль"
                                                    name="password">
                                            </div>
                                            <div class="col-md-4 mb-2 pl-1">
                                                <label>Email</label>
                                                <input class="form-control" type="email" placeholder="Введите Email"
                                                    name="email" required value="{!! $user->email !!}">
                                            </div>
                                            <div class="col-md-4 mb-2 pl-0">
                                                <label>Личный телефон</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Введите телефон в формате 77777777777" name="phone"
                                                    required value="{!! $user->phone !!}">
                                            </div>
                                            <div class="col-md-4 mb-2 pl-1">
                                                <label>Отдел</label>
                                                <input class="form-control" type="text" placeholder="Введите Отдел"
                                                    name="department" required value="{!! $user->department !!}">
                                            </div>
                                            <div class="col-md-4 mb-2 pl-1">
                                                <label>Должность</label>
                                                <input class="form-control" type="text" placeholder="Введите Должность"
                                                    name="position" required value="{!! $user->position !!}">
                                            </div>
                                            <div class="col-md-4 mb-2 pl-1">
                                                <label>Работает</label>
                                                <select name="working" class="form-control">
                                                    <option value="0" @if ($user->working == false) selected @endif>Нет
                                                    </option>
                                                    <option value="1" @if ($user->working == true) selected @endif>Да
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="block text-center">
                                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
