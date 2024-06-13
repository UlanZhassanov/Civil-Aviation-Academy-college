@extends('admin.layouts.app')
@php $parrentCat  = 'Управление сайтом' @endphp
@php $active_menu  = 'Страницы' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Управление страницами сайта</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Редактирование страницы</h2>
                </div>
            </div>
            <div class="pages__content">
                <div class="d-flex switcher" id="lang">
                    <p id="ru" class="pl-3 pb-2 pt-2 text-center border bg-light text-black">Русский</p>
                    <p id="kk" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-primary text-white">Қазақ</p>
                    <p id="en" class="pr-3 pl-3 pb-2 pt-2 text-center border bg-primary text-white">English</p>
                </div>
            </div>
            <div id="lang-blocks" class="mt-3">
                <form action="{{ route('admin.website.pages.update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
						  @method('PUT')
                    <div id="ru-block">
                        <div class="form-group">
                            <label><b>Название</b></label>
                            <input class="form-control" type="text" name="title_ru" value="{!! $data->title_ru !!}" required>
                        </div>
                        <div>
                            <label><b>Описание</b></label>
                            <textarea name="desc_ru" id="editor-ru">{!! $data->desc_ru !!}</textarea>
                        </div>
                    </div>
                    <div id="kk-block" style="display: none">
                        <div class="form-group">
                            <label><b>Аты</b></label>
                            <input class="form-control" type="text" name="title_kk" value="{!! $data->title_kk !!}" required>
                        </div>
                        <div>
                            <label><b>Сипаттамасы</b></label>
                            <textarea name="desc_kk" id="editor-kz">{!! $data->desc_kk !!}</textarea>
                        </div>
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input class="form-control" type="text" name="title_en" value="{!! $data->title_en !!}" required>
                        </div>
                        <div>
                            <label><b>Description</b></label>
                            <textarea name="desc_en" id="editor-en">{!! $data->desc_en !!}</textarea>
                        </div>
                    </div>

                    <div class="block mt-4">
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
