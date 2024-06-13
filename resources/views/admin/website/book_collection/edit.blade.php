@extends('admin.layouts.app')
@php $parrentCat  = 'Управление книгами' @endphp
@php $active_menu  = 'Подборка книг' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Управление подборкой книг</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Редактирование книг</h2>
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
                <form action="{{ route('admin.website.book_collection.update', $book_collection->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="ru-block">
                        <div class="mb-4">
                            <label class="font-weight-bold">Название</label>
                            <input type="text" name="title_ru" value="{!! unserialize($book_collection->titles)->ru !!}" class="form-control"
                                required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Автор</label>
                            <input type="text" name="author_ru" value="{!! unserialize($book_collection->authors)->ru !!}" class="form-control" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Описание</label>
                            <textarea name="desc_ru" id="editor-ru" class="form-control">{!! unserialize($book_collection->descriptions)->ru !!}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold d-block">Обложка</label>
                            <img src="/storage/books/book_collection/{!! unserialize($book_collection->cover_imgs)->ru !!}" class="mb-2" alt="" width="200"
                                height="150">
                        </div>
                        <div class="mb-4">
                            <label>Если хотите изменить фононовое изображения, <b>выберите новое</b></label>
                            <input type="file" name="cover_img_ru" class="form-control-file" />
                        </div>
                    </div>
                    <div id="kk-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Аты</label>
                            <input type="text" name="title_kk" value="{!! unserialize($book_collection->titles)->kk !!}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Автор</label>
                            <input type="text" name="author_ru" value="{!! unserialize($book_collection->authors)->kk !!}" class="form-control" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Сипаттамасы</label>
                            <textarea name="desc_kk" id="editor-kz" class="form-control">{!! unserialize($book_collection->descriptions)->kk !!}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold d-block">Мұқаба</label>
                            @if (!empty(unserialize($book_collection->cover_imgs)->kk))
                                <img src="/storage/books/book_collection/{!! unserialize($book_collection->cover_imgs)->kk !!}" class="mb-2" alt="" width="200"
                                    height="150">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label>Если хотите изменить фононовое изображения, <b>выберите новое</b></label>
                            <input type="file" name="cover_img_kk" class="form-control-file" />
                        </div>
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="title_en" value="{!! unserialize($book_collection->titles)->en !!}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Author</label>
                            <input type="text" name="author_ru" value="{!! unserialize($book_collection->authors)->en !!}" class="form-control" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Description</label>
                            <textarea name="desc_en" id="editor-en" class="form-control">{!! unserialize($book_collection->descriptions)->en !!}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold d-block">Cover</label>
                            @if (!empty(unserialize($book_collection->cover_imgs)->en))
                                <img src="/storage/books/book_collection/{!! unserialize($book_collection->cover_imgs)->en !!}" class="mb-2" alt="" width="200"
                                    height="150">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label>Если Вы хотите изменить фононовое изображения, <b>выберите новое</b></label>
                            <input type="file" name="cover_img_en" class="form-control-file" />
                        </div>
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
