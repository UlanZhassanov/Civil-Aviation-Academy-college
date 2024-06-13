@extends('admin.layouts.app')
@php $parrentCat  = 'Управление новостями и событиями' @endphp
@php $active_menu  = 'СМИ о нас' @endphp
@section('content')
    <h1>СМИ о нас</h1>
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>СМИ о нас</h2>
                </div>
                <div class="pages__add-page">
                    <a href="{{ route('admin.website.media_about_us.create') }}" class="btn btn-secondary">
                        Добавить пост
                    </a>
                </div>
            </div>
            <div class="pages__content">
                <div class="pages__page thead">
                    <p style="width: 50%">Название</p>
                    <p class="text-center" style="width: 15%">СМИ</p>
                    <p class="text-center" style="width: 15%">Дата и время</p>
                    <p class="text-right" style="width: 20%">Редактирование</p>
                </div>
                @foreach ($media_about_us as $item)
                    <div class="pages__page">
                        <p style="width: 50%">{!! $item->title_ru !!}
                        </p>
                        <p class="text-center" style="width: 15%">{!! $item->media_ru !!}</p>
                        <p class="text-center" style="width: 15%">{!! date('d.m.Y H:i', strtotime($item->publish_at)) !!}</p>
                        <div class="text-right d-flex flex-row-reverse" style="width: 20%">
                            <a href="{{ route('admin.website.media_about_us.edit', $item->id) }}"
                                class="btn btn-primary ml-1">Редактировать</a>
                            <form action="{{ route('admin.website.media_about_us.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Вы точно хотите удалить?')">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection
