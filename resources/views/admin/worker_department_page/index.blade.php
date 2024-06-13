@extends('admin.layouts.app')
@php $parrentCat  = 'Управление работниками' @endphp
@php $active_menu  = 'Доступ к страницам кафедры' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{!! session('alert') !!}</h3>
        </div>
    @endif
    <h1>Доступ к редактированию страниц сайта</h1>
    <section id="nav">
        <div class="nav">
            <div class="nav__top">
                <h2>Главное меню</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Добавить
                </button>
            </div>

            <div class="nav__links">
                <div class="d-flex flex-wrap">
                    <div class="col-md-4 pl-0">
                        <p><b>Сотрудник</b></p>
                    </div>
                    <div class="col-md-3">
                        <p><b>Кафедра</b></p>
                    </div>
                    <div class="col-md-3">
                        <p><b>Страница</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Удалить</b></p>
                    </div>
                </div>
                @foreach ($list as $item)
                @php
                    $dep_page_name = unserialize($item->department_page_name);
                    $dep_page_name = $dep_page_name['ru'];
                @endphp
                    <div class="d-flex flex-wrap">
                        <div class="col-md-4 pl-0">
                            <p>{!! $item->surname . ' ' . $item->name . ' ' . $item->patronymic !!}</p>
                        </div>
                        <div class="col-md-3 pl-0">
                            <p>{!! $item->department_name !!}</p>
                        </div>
                        <div class="col-md-3">
                            <p>
                                    {!! $dep_page_name. " | ".$item->slug !!}
                            </p>
                        </div>
                        <div class="col-md-2 text-center">
                            <form class="p-0" action="{{ route('admin.worker_department_page.destroy', $item->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Вы уверены что хотите удалить?')">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="modal-form" action="{!! route('admin.worker_department_page.store') !!}" method="POST">
                                @csrf
                                @method('POST')
                                <div id="user_id">
                                    <label>Выберите сотрудника:</label>
                                    <select name="user_id">
                                        @foreach ($allUsers as $item)
                                            <option value="{!! $item->user_id !!}">{!! $item->surname . ' ' . $item->name . ' ' . $item->patronymic !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="department_page_id">
                                    <label>Выберите страницу:</label>
                                    <select name="department_page_id">
                                        @foreach ($allPages as $item)
                                        @php
                                            $dep_page_name = unserialize($item->department_page_name);
                                            $dep_page_name = $dep_page_name['ru'];
                                        @endphp
                                            <option value="{!! $item->id !!}">
                                                {!! $item->id !!}) {!! $item->department_name." | ".$dep_page_name." | ".$item->slug !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="block">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
