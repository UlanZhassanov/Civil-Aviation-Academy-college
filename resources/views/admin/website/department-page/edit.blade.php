@extends('admin.layouts.app')
@php $parrentCat  = 'Управление сайтом' @endphp
@php $active_menu  = 'Страницы кафедр' @endphp
@section('content')
    <h1>Редактирование кафедры</h1>
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Редактирование страницы кафедры</h2>
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
                <form action="{{ route('admin.website.department-page.update', $department_page->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
						  @method('PUT')
                    <div id="ru-block">
                        <div class="mb-4">
                            <label class="font-weight-bold">Кафедра</label>
                            @if($canCreate === true)
                            <select class="form-control" aria-label="Default select example" name="department_id"
                                required>
                                <option selected value="{!! $department_id !!}" disabled>-----</option>
                                @foreach ($departments as $department)
                                    <option value="{!! $department->id !!}"
                                        @if ($department_id == $department->id) selected @endif>{!! $department->name !!}</option>
                                @endforeach
                            </select>
                            @endif
                            @if($canCreate === false)
                            <input type="text" name="department_id" class="form-control" value="{!! $department_id !!}" disabled />
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Название страницы</label>
                            <input type="text" name="name_ru" class="form-control" value="{!! $name['ru'] !!}"
                                required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Контент</label>
                            <textarea name="content_ru" id="editor-ru" class="form-control"> {!! $content['ru'] !!}</textarea>
                        </div>
                        @if($canCreate === true)
                        <div class="mb-4">
                            <label class="font-weight-bold d-block">Фоновое изображение</label>
                            <img src="{!! $image !!}" class="mb-2" alt="" width="200" height="150">
                        </div>
                        <div class="mb-4">
                            <label >Если хотите изменить фононовое изображения, <b>выберите новое</b></label>
                            <input type="file" name="image_ru" class="form-control-file"  />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Порядок вывода</label>
                            <input type="number" name="sort" class="form-control" value="{!! $sort !!}" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Выберите слаг</label>
                            <select class="form-control" aria-label="Default select example" name="slug" required>
                                <option selected value="" disabled>-----</option>
                                @foreach ($slugs as $slug1)
                                    <option value="{!! $slug1 !!}"
                                     @if ($slug1 == $slug) selected @endif>{!! $slug1 !!}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        @if($canCreate === false)
                        <input type="hidden" name="sort" class="form-control" value="{!! $sort !!}" required />
                        <input type="hidden" name="slug" class="form-control" value="{!! $slug !!}" required />
                        @endif
                    </div>
                    <div id="kk-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Аты</label>
                            <input type="text" name="name_kk" class="form-control" value="{!! $name['kk'] !!}">
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Сипаттамасы</label>
                            <textarea name="content_kk" id="editor-kz"  class="form-control"> {!! $content['kk'] !!}</textarea>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="font-weight-bold">Фондық сурет</label>
                            <input type="file" name="image_kk" class="form-control-file" />
                        </div> --}}
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="name_en" class="form-control" value="{!! $name['en'] !!}" />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Description</label>
                            <textarea name="content_en" id="editor-en" class="form-control"> {!! $content['en'] !!}</textarea>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="font-weight-bold">Background image</label>
                            <input type="file" name="image_en" class="form-control-file" />
                        </div> --}}
                    </div>
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
