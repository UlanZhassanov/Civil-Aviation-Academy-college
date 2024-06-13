@extends('admin.layouts.app')
@php $parrentCat  = 'Управление работниками' @endphp
@php $active_menu  = 'Добавление доступа' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Редактирование доступа</h1>
    <section id="pages">
        <form action="{{ route('admin.workers-permissions.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <input class="form-control" type="text"
                    value="{!! $user->surname !!} {!! $user->name !!} {!! $user->patronymic !!}" disabled>
            </div>
            <div class="d-flex border border-primary align-items-center">
                <div class="col-md-3 pl-3 border-right border-primary pb-2 pt-2">
                    <label class="mb-0">
                        <h4 class="mb-0"><b>Название страницы</b></h4>
                    </label>
                </div>
                <div class="col-md-9 pl-0 pr-0">
                    <div class="d-flex">
                        <div class="col-md-3 text-center border-right border-primary pb-2 pt-2">
                            <label class="mb-0">
                                <h5 class="mb-0"><b>Просмотр</b></h5>
                            </label>
                        </div>
                        <div class="col-md-3 text-center border-right border-primary pb-2 pt-2">
                            <label class="mb-0">
                                <h5 class="mb-0"><b>Создание</b></h5>
                            </label>
                        </div>
                        <div class="col-md-3 text-center border-right border-primary pb-2 pt-2">
                            <label class="mb-0">
                                <h5 class="mb-0"><b>Редактирование</b></h5>
                            </label>
                        </div>
                        <div class="col-md-3 text-center border-primary pb-2 pt-2">
                            <label class="mb-0">
                                <h5 class="mb-0"><b>Удаление</b></h5>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-primary flex-wrap mb-3">
                @foreach ($data as $key => $value)
                    <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                        <div class="col-md-3 pl-3 pr-3">
                            <label class="mb-0">
                                <h5 class="mb-0">{{ $key }}</h5>
                            </label>
                        </div>
                        <div class="col-md-9 pl-0 pr-0">
                            <div class="d-flex">
                                <div class="col-md-3 pl-1 pr-1 text-center">
                                    <select class="form-control" name="{!! $value !!}_read">
                                        @if (isset($permissions->$value->read))
                                            <option value="0" @if ($permissions->$value->read == false) selected @endif>Нет</option>
                                            <option value="1" @if ($permissions->$value->read == true) selected @endif>Да</option>
                                        @else
                                            <option value="0" selected>Нет</option>
                                            <option value="1">Да</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3 pl-1 pr-1 text-center">
                                    <select class="form-control" name="{!! $value !!}_create">
                                        @if (isset($permissions->$value->create))
                                            <option value="0" @if ($permissions->$value->create == false) selected @endif>Нет</option>
                                            <option value="1" @if ($permissions->$value->create == true) selected @endif>Да</option>
                                        @else
                                            <option value="0" selected>Нет</option>
                                            <option value="1">Да</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3 pl-1 pr-1 text-center">
                                    <select class="form-control" name="{!! $value !!}_update">
                                        @if (isset($permissions->$value->update))
                                            <option value="0" @if ($permissions->$value->update == false) selected @endif>Нет</option>
                                            <option value="1" @if ($permissions->$value->update == true) selected @endif>Да</option>
                                        @else
                                            <option value="0" selected>Нет</option>
                                            <option value="1">Да</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3 pl-1 pr-1 text-center">
                                    <select class="form-control" name="{!! $value !!}_delete">
                                        @if (isset($permissions->$value->delete))
                                            <option value="0" @if ($permissions->$value->delete == false) selected @endif>Нет
                                            </option>
                                            <option value="1" @if ($permissions->$value->delete == true) selected @endif>Да</option>
                                        @else
                                            <option value="0" selected>Нет</option>
                                            <option value="1">Да</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="block text-center">
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </form>
    </section>
@endsection
