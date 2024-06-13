@extends('admin.layouts.app')
@php $parrentCat  = 'Управление сайтом' @endphp
@php $active_menu  = 'Кафедры' @endphp
@section('content')
    <h1>Управление кафедрами</h1>
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Кафедры</h2>
                </div>
                <div class="pages__add-page">
                    <a href="{{ route('admin.website.department.create') }}" class="btn btn-secondary">
                        Добавить кафедру
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap mb-2">
            <div class="col-md-4 pl-0">
                <b>Название</b>
            </div>
            <div class="col-md-4">
                <b>Слаг</b>
            </div>
            <div class="col-md-2 text-center">
                <b>Сортировка</b>
            </div>
            <div class="col-md-1 text-center">
                <b>Удаление</b>
            </div>
            <div class="col-md-1 text-right">
                <b>Редактирование</b>
            </div>
        </div>
        @foreach ($departments as $department)
            <div class="d-flex flex-wrap mb-2">
                <div class="col-md-4 pl-0">
                    {!! $department->name !!}
                </div>
                <div class="col-md-4">
                    {!! $department->slug !!}
                </div>
                <div class="col-md-2 text-center">
                    {!! $department->sort !!}
                </div>
                <div class="col-md-1 text-center">
                    <form action="{{ route('admin.website.department.destroy', $department->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Вы уверены что хотите удалить кафедру?')">
                            Удалить
                        </button>
                    </form>
                </div>
                <div class="col-md-1 text-right">
                    <a class="btn btn-primary" href="{{ route('admin.website.department.edit', $department->slug) }}">
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
