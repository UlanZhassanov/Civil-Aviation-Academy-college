@extends('admin.layouts.app')
@php $parrentCat  = 'Управление сайтом' @endphp
@php $active_menu  = 'Страницы кафедр' @endphp
@section('content')
    <h1>Управление страницами кафедр</h1>
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Страницы кафедр</h2>
                </div>
                <div class="pages__add-page">
                    @if($canCreate === true)
                    <a href="{{ route('admin.website.department-page.create') }}" class="btn btn-secondary">
                        Добавить страницу
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap mb-2">
            <div class="col-md-3 pl-0">
                <b>Название страницы</b>
            </div>
            <div class="col-md-3">
                <b>Кафедра</b>
            </div>
            @if($canCreate === true)
            <div class="col-md-2 text-center">
                <b>Слаг</b>
            </div>
            <div class="col-md-2 text-center">
                <b>Сортировка</b>
            </div>
            <div class="col-md-1 text-center">
                <b>Удаление</b>
            </div>
            @endif
            <div class="col-md-1 text-right">
                <b>Редактирование</b>
            </div>
        </div>
        @foreach ($departments as $department)
            @php
                $name = unserialize($department->name);
                $name = $name['ru'];
            @endphp
            <div class="d-flex flex-wrap mb-2">
                <div class="col-md-3 pl-0">
                    {!! $name !!}
                </div>
                <div class="col-md-3">
                    {!! $department->department_name !!}
                </div>
                @if($canCreate === true)
                <div class="col-md-2 text-center">
                    {!! $department->slug !!}
                </div>
                <div class="col-md-2 text-center">
                    {!! $department->sort !!}
                </div>
                <div class="col-md-1 text-center">
                    <form action="{{ route('admin.website.department-page.destroy', $department->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Вы уверены что хотите удалить кафедру?')">
                            Удалить
                        </button>
                    </form>
                </div>
                @endif
                <div class="col-md-1 text-right">
                    <a class="btn btn-primary" href="{{ route('admin.website.department-page.edit', $department->id) }}">
                        Редактировать
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </section>
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection
