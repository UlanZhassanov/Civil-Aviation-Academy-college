@extends('admin.layouts.app')
@php $parrentCat  = 'Управление работниками' @endphp
@php $active_menu  = 'Добавление доступов' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Добавление доступов</h1>
    <section id="pages">
        <form action="{{ route('admin.workers-permissions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="mb-0">
                    <h4 class="mb-0"><b>Выберите пользователя</b></h4>
                </label>
                <select name="user_id" class="form-control">
						@foreach ($users as $user)
							<option value="{!! $user->user_id !!}">{!! $user->surname !!} {!! $user->name !!} {!! $user->patronymic !!}</option>
						@endforeach
					 </select>
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
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Абитуриенты</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="enrollees_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="enrollees_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="enrollees_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="enrollees_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Выпускники</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="graduates_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="graduates_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="graduates_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="graduates_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Вакцинация</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="vaccination_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="vaccination_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="vaccination_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="vaccination_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Новости</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="news_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="news_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="news_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="news_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Мероприятия (E-Orientation)</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="studevents_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="studevents_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="studevents_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="studevents_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Книги</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="books_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="books_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="books_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="books_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Навигация</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="navigation_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="navigation_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="navigation_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="navigation_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Страницы</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="pages_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="pages_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="pages_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="pages_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom border-info pt-1 pb-1">
                    <div class="col-md-3 pl-3 pr-3">
                        <label class="mb-0">
                            <h5 class="mb-0">Работники</h5>
                        </label>
                    </div>
                    <div class="col-md-9 pl-0 pr-0">
                        <div class="d-flex">
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="workers_read">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="workers_create">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="workers_update">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-md-3 pl-1 pr-1 text-center">
                                <select class="form-control" name="workers_delete">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block text-center">
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </form>
    </section>
@endsection
