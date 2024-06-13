@php
use App\Models\User;
$worker_permission = User::find(Auth::user()->id)->workersPermissions;
$worker_permission = unserialize($worker_permission->permission);
@endphp

@extends('admin.layouts.app')
@php $parrentCat  = 'Управление книгами' @endphp
@php $active_menu  = 'Страницы библиотеки' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Управление страницами библиотеки</h1>
    <section id="pages">
        <div class="pages">
            <div class="pages__head">
                <div class="pages__title">
                    <h2>Страницы</h2>
                </div>
                <div class="pages__add-page">
                    @if($canCreate === true || $worker_permission->pages->create == true)
                    <a href="{{ route('admin.website.library_pages.create') }}" class="btn btn-primary">
                        Создать страницу
                    </a>
                    @endif
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-1 pl-0">
                    <p><b>#</b></p>
                </div>
                <div class="col-md-4 pl-0">
                    <p><b>Название</b></p>
                </div>
                <div class="col-md-3">
                    <p><b>URL</b></p>
                </div>
                @if($canCreate === true || $worker_permission->pages->delete == true)
                <div class="col-md-2 text-center">
                    <p><b>Удалить</b></p>
                </div>
                @endif
                <div class="col-md-2 pr-0 text-right">
                    <p><b>Редактировать</b></p>
                </div>
            </div>
            <div>
                @foreach ($data as $item)
                    <div class="d-flex flex-wrap">
                        <div class="col-md-1 pl-0">
                            <p>{{ $item->id }}</p>
                        </div>
                        <div class="col-md-4 pl-0">
                            <p>{{ $item->title_ru }}</p>
                        </div>
                        <div class="col-md-3">
                            <p>{!! $item->slug !!}</p>
                        </div>
                        @if($canCreate === true || $worker_permission->pages->delete == true)
                        <div class="col-md-2 text-center">
                            <form action="{{ route('admin.website.library_pages.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Вы уверены что хотите удалить страницу?')">
                                    Удалить страницу
                                </button>
                            </form>
                        </div>
                        @endif
                        <div class="col-md-2 pr-0 text-right">
                            <a class="btn btn-primary" href="{{ route('admin.website.library_pages.edit', $item->id) }}">
                                Редактировать страницу
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="createPage" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 style="text-align: center">Создание страницы</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.website.library_pages.store') }}" {{-- id="submitform" --}} method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">
                            <div>
                                <label>Название</label>
                                <input type="text" name="title_ru">
                            </div>
                            <div>
                                <label>Описание</label>
                                <textarea name="desc_ru" id="editor"></textarea>
                            </div>
                            <div class="block">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection
