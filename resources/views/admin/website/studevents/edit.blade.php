@extends('admin.layouts.app')
@php $parrentCat  = 'Управление новостями и событиями' @endphp
@php $active_menu  = 'Мероприятия' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Управление мероприятиями (E-orientation)</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Редактирование мероприятия</h2>
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
                <form action="{{ route('admin.website.studevents.update', $studevents->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="ru-block">
                        <div class="mb-4">
                            <label class="font-weight-bold">Название</label>
                            <input type="text" name="title_ru" value="{!! unserialize($studevents->titles)->ru !!}" class="form-control"
                                required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Описание</label>
                            <textarea name="desc_ru" id="editor-ru" class="form-control">{!! unserialize($studevents->descriptions)->ru !!}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold d-block">Фоновое изображение</label>
                            <img src="/storage/studevents/{!! unserialize($studevents->bg_images)->ru !!}" class="mb-2" alt="" width="200"
                                height="150">
                        </div>
                        <div class="mb-4">
                            <label>Если хотите изменить фононовое изображения, <b>выберите новое</b></label>
                            <input type="file" name="bg_image_ru" class="form-control-file" />
                        </div>
                    </div>
                    <div id="kk-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Аты</label>
                            <input type="text" name="title_kk" value="{!! unserialize($studevents->titles)->kk !!}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Сипаттамасы</label>
                            <textarea name="desc_kk" id="editor-kz" class="form-control">{!! unserialize($studevents->descriptions)->kk !!}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold d-block">Фондық сурет</label>
                            @if (!empty(unserialize($studevents->bg_images)->kk))
                                <img src="/storage/studevents/{!! unserialize($studevents->bg_images)->kk !!}" class="mb-2" alt="" width="200"
                                    height="150">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label>Если хотите изменить фононовое изображения, <b>выберите новое</b></label>
                            <input type="file" name="bg_image_kk" class="form-control-file" />
                        </div>
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="title_en" value="{!! unserialize($studevents->titles)->en !!}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Description</label>
                            <textarea name="desc_en" id="editor-en" class="form-control">{!! unserialize($studevents->descriptions)->en !!}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold d-block">Background image</label>
                            @if (!empty(unserialize($studevents->bg_images)->en))
                                <img src="/storage/studevents/{!! unserialize($studevents->bg_images)->en !!}" class="mb-2" alt="" width="200"
                                    height="150">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label>Если Вы хотите изменить фононовое изображения, <b>выберите новое</b></label>
                            <input type="file" name="bg_image_en" class="form-control-file" />
                        </div>
                    </div>
                    @if (!empty($studevents->more_images))
                    <br />
                        <div>
                            <label class="font-weight-bold">Дополнительные изображения</label>
                            <div class="d-flex flex-wrap">
                                @foreach (unserialize($studevents->more_images) as $item)
                                    <div class="col-md-2 mb-3 p-0">
                                        <img src="/storage/studevents/{!! $item !!}" class="pl-2 pr-2" alt=""
                                            width="100%" height="150">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <br />
                    <div>
                        <label class="font-weight-bold">Дата и время публикации</label>
                        <input class="form-control" type="datetime-local" name="publish_at"
                            value="{!! date('Y-m-d\TH:i', strtotime($studevents->publish_at)) !!}" disabled>
                    </div>
                    <br />
                    <div class="mb-4 form-check">
                        <input class="form-check-input" type="checkbox" name="agree" id="flexCheckChecked" required>
                        <label class="form-check-label h5" for="flexCheckChecked">
                            Я ознакомлен и несу ответственность за размещение мною информации, согласно закону РК от 23 июля 1999 года № 451-I. <br/> Закон <a href="https://adilet.zan.kz/rus/docs/Z990000451_" target="_blank">"о средствах массовой информации"</a>, глава 7, статья 25.
                        </label>
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
@section('scripts')
@include('admin.ckeditor')
@endsection
