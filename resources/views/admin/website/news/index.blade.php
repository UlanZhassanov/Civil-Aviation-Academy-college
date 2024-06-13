@extends('admin.layouts.app')
@php $parrentCat  = 'Управление новостями и событиями' @endphp
@php $active_menu  = 'Новости' @endphp
@section('content')
    <h1>Управление новостями</h1>
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Новости</h2>
                </div>
                <div class="pages__add-page">
                    <a href="{{ route('admin.website.news.create') }}" class="btn btn-secondary">
                        Добавить новость
                    </a>
                </div>
            </div>
            <div class="pages__content">
                <div class="pages__page thead">
                    <p style="width: 50%">Название</p>
                    <p class="text-center" style="width: 20%">Дата публикации</p>
                    <p class="text-right" style="width: 30%">Редактирование</p>
                </div>
                @foreach ($news as $item)
                    <div class="pages__page">
                        <p style="width: 50%">{!! unserialize($item->titles)->ru !!}
                            @if($item->compliance === 1)
                            <span class="btn-danger">compliance</span>
                            @endif
                        </p>
                        <p class="text-center" style="width: 20%">{!! date('d.m.Y H:i', strtotime($item->publish_at)) !!}</p>
                        <div class="text-right d-flex flex-row-reverse" style="width: 30%">
                            <a href="{{ route('admin.website.news.edit', $item->id) }}"
                                class="btn btn-primary ml-1">Редактировать</a>
                            <form action="{{ route('admin.website.news.destroy', $item->id) }}" method="POST">
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
