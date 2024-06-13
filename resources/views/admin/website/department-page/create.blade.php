@extends('admin.layouts.app')
@php $parrentCat  = 'Управление сайтом' @endphp
@php $active_menu  = 'Страницы кафедр' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Создание страниц кафедр</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Создание страницы кафедры</h2>
                </div>
            </div>
            <div class="pages__content">
                <div class="d-flex switcher" id="lang">
                    <p id="ru" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-light text-black">Русский</p>
                    <p id="kk" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-primary text-white">Қазақ</p>
                    <p id="en" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-primary text-white">English</p>
                </div>
            </div>
            <div id="lang-blocks" class="mt-3">
                <form action="{{ route('admin.website.department-page.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="ru-block">
                        <div class="mb-4">
                            <label class="font-weight-bold">Кафедра</label>
                            <select class="form-control" aria-label="Default select example" name="department_id"
                                required>
                                <option selected value="" disabled>-----</option>
                                @foreach ($departments as $department)
                                    <option value="{!! $department->id !!}">{!! $department->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Название страницы</label>
                            <input type="text" name="name_ru" class="form-control" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Контент</label>
                            <textarea name="content_ru" class="form-control" id="editor-dep-page-ru"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Картинка</label>
                            <input type="file" name="image_ru" class="form-control-file" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Порядок вывода</label>
                            <input type="number" name="sort" class="form-control" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Выберите слаг</label>
                            <select class="form-control" aria-label="Default select example" name="slug" required>
                                <option selected value="" disabled>-----</option>
                                @foreach ($slugs as $slug)
                                    <option value="{!! $slug !!}">{!! $slug !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="kk-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Аты</label>
                            <input type="text" name="name_kk" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Сипаттамасы</label>
                            <textarea name="content_kk" class="form-control" id="editor-dep-page-kz"></textarea>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="font-weight-bold">Фондық сурет</label>
                            <input type="file" name="image_kk" class="form-control-file" />
                        </div> --}}
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="name_en" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Description</label>
                            <textarea name="content_en" class="form-control" id="editor-dep-page-en"></textarea>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="font-weight-bold">Background image</label>
                            <input type="file" name="image_en" class="form-control-file" />
                        </div> --}}
                    </div>
                    <div class="block">
                        <button type="submit" class="btn btn-primary">Создать</button>
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
