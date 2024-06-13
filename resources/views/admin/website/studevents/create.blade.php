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
                    <h2>Создание мероприятия</h2>
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
                <form action="{{ route('admin.website.studevents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="ru-block">
                        <div class="mb-4">
                            <label class="font-weight-bold">Название</label>
                            <input type="text" name="title_ru" class="form-control" required />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Описание</label>
                            <textarea name="desc_ru" id="editor-ru" class="form-control"></textarea>
                            <input type='hidden' value='0' name='compliance'>
                        </div>
                        @if($createForCompliance === true)
                        <div class="mb-4">
                            <label><b>for compliance</b></label>
                            <input type="checkbox" name="compliance" value="1" unchecked/>
                        </div>
                        @endif
                        <div class="mb-4">
                            <label class="font-weight-bold">Фоновое изображение</label>
                            <input type="file" name="bg_image_ru" class="form-control-file" required />
                        </div>
                    </div>
                    <div id="kk-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Аты</label>
                            <input type="text" name="title_kk" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Сипаттамасы</label>
                            <textarea name="desc_kk" id="editor-kz" class="form-control"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Фондық сурет</label>
                            <input type="file" name="bg_image_kk" class="form-control-file" />
                        </div>
                    </div>
                    <div id="en-block" style="display: none">
                        <div class="mb-4">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="title_en" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Description</label>
                            <textarea name="desc_en" id="editor-en" class="form-control"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="font-weight-bold">Background image</label>
                            <input type="file" name="bg_image_en" class="form-control-file" />
                        </div>
                    </div>
                    <br />
                    <div>
                        <label class="font-weight-bold">Дополнительные изображения</label>
                        <input type="file" name="more_image_1" class="form-control-file mb-1" />
                        <input type="file" name="more_image_2" class="form-control-file mb-1" />
                        <input type="file" name="more_image_3" class="form-control-file mb-1" />
                        <input type="file" name="more_image_4" class="form-control-file mb-1" />
                        <input type="file" name="more_image_5" class="form-control-file mb-1" />
                        <input type="file" name="more_image_6" class="form-control-file mb-1" />
                        <input type="file" name="more_image_7" class="form-control-file mb-1" />
                        <input type="file" name="more_image_8" class="form-control-file mb-1" />
                        <input type="file" name="more_image_9" class="form-control-file mb-1" />
                    </div>
                    <br />
                    <div>
                        <label class="font-weight-bold">Дата и время публикации</label>
                        <input type="datetime-local" name="publish_at" class="form-control" required>
                    </div>
                    <br />
                    <div class="mb-4 form-check">
                        <input class="form-check-input" type="checkbox" name="agree" id="flexCheckChecked" required>
                        <label class="form-check-label h5" for="flexCheckChecked">
                            Я ознакомлен и несу ответственность за размещение мною информации, согласно закону РК от 23 июля 1999 года № 451-I. <br/> Закон <a href="https://adilet.zan.kz/rus/docs/Z990000451_" target="_blank">"о средствах массовой информации"</a>, глава 7, статья 25.
                        </label>
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
