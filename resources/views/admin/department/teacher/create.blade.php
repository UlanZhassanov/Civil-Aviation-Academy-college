@extends('admin.layouts.app')
@php $parrentCat  = 'Кафедры' @endphp
@php $active_menu  = 'Преподаватели' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Кафедры</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Добавление преподавателей</h2>
                </div>
            </div>
            <div class="pages__content">
                <div class="d-flex switcher" id="lang">
                    <p id="ru" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-light text-black">Русский</p>
                    <p id="kk" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-primary text-white">Қазақ</p>
                    <p id="en" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-primary text-white">English</p>
                </div>
            </div>
            <div id="lang-blocks">
                <form action="{{ route('admin.department.teacher.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="ru-block">
                        <div class="form-group">
                            <label>Фамилия</label>
                            <input class="form-control" type="text" name="surname" required>
                        </div>
                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Отчество</label>
                            <input class="form-control" type="text" name="patronymic">
                        </div>
                        <div class="form-group">
                            <label>Выберите кафедру</label>
                            <select class="form-control" type="text" name="department">
                                <option disabled selected>----</option>
                                @foreach ($departments as $department)
                                    <option value="{!! $department->id !!}">{!! $department->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Должность</label>
                            <input class="form-control" type="text" name="position">
                        </div>
                        <div class="form-group">
                            <label>Фотография</label>
                            <input class="form-control" type="file" name="photo" required">
                        </div>
                        <div class="form-group">
                            <label>Телефон</label>
                            <input class="form-control" placeholder="Без первой 8ки" type="text" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Информация</label>
                            <textarea class="form-control" name="information" id="editor-ru"></textarea>
                        </div>
                    </div>
                    {{-- <div id="kk-block" style="display: none">
                        <div class="form-group">
                            <label>Аты</label>
                            <input class="form-control" type="text" name="title_kk" required>
                        </div>
                        <div>
                            <label>Сипаттамасы</label>
                            <textarea class="form-control" name="desc_kk" id="editor-kz"></textarea>
                        </div>
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" name="title_en" required>
                        </div>
                        <div>
                            <label>Description</label>
                            <textarea class="form-control" name="desc_en" id="editor-en"></textarea>
                        </div>
                    </div> --}}

                    <div class="block">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('admin.languages')
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection
