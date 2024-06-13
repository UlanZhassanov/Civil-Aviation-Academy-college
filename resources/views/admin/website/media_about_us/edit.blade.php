@extends('admin.layouts.app')
@php $parrentCat  = 'Управление новостями и событиями' @endphp
@php $active_menu  = 'СМИ о нас' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>СМИ о нас</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Редактирование поста</h2>
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
                <form action="{{ route('admin.website.media_about_us.update', $media_about_us->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="ru-block">
                        <div class="mb-4">
                            <label class="font-weight-bold">Название</label>
                            <input type="text" name="title_ru" value="{!! $media_about_us->title_ru !!}" class="form-control"
                                required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">СМИ</label>
                            <input type="text" name="media_ru" class="form-control"
                                value="{!! $media_about_us->media_ru !!}" />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Ссылка</label>
                            <input type="text" name="link" class="form-control"
                                value="{!! $media_about_us->link !!}" />
                        </div>
                    </div>
                    <div id="kk-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Атауы</label>
                            <input type="text" name="title_kk" value="{!! $media_about_us->title_kk !!}" class="form-control"
                                required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">БАҚ</label>
                            <input type="text" name="media_kk" class="form-control"
                                value="{!! $media_about_us->media_kk !!}" />
                        </div>
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="title_en" value="{!! $media_about_us->title_en !!}" class="form-control"
                                required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Media</label>
                            <input type="text" name="media_en" class="form-control"
                                value="{!! $media_about_us->media_en !!}" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="font-weight-bold d-block">Фоновое изображение</label>
                        <img src="/storage/mediaAboutUs/{!! $media_about_us->bg_image !!}" class="mb-2" alt="" width="200"
                            height="150">
                    </div>
                    <div class="mb-4">
                        <label>Если хотите изменить фононовое изображения, <b>выберите новое</b></label>
                        <input type="file" name="bg_image" class="form-control-file" />
                    </div>
                    <div>
                        <label class="font-weight-bold">Дата и время публикации</label>
                        <input class="form-control" type="datetime-local" name="publish_at"
                            value="{!! date('Y-m-d\TH:i', strtotime($media_about_us->publish_at)) !!}">
                    </div>
                    <br />
                    <div class="block">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('admin.languages')
@endsection
