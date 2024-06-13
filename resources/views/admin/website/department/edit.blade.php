@extends('admin.layouts.app')
@php $parrentCat  = 'Управление сайтом' @endphp
@php $active_menu  = 'Кафедры' @endphp
@section('content')
    <h1>Редактирование кафедры</h1>
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <section id="pages">
        <form action="{{ route('admin.website.department.update', $department->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
				@method('PUT')
            <div class="form-group">
                <label for="name"><b>Название</b></label>
                <input type="text" class="form-control" id="name" name="name" value="{!! $department->name !!}" required>
            </div>
            <div class="form-group">
                <label for="image"><b>Картинка</b></label><br />
                @if (isset($department->image))
                    <img src="{!! $department->image !!}" width="300" height="200" alt="">
                @endif
            </div>
            <div class="custom-file mb-4">
                <input type="file" class="custom-file-input" id="customFile" name="image">
                <label class="custom-file-label" for="customFile">Выбрать новую картинку...</label>
            </div>
            <div class="form-group">
                <label for="sort"><b>Сортировка</b></label>
                <input type="text" class="form-control" id="sort" name="sort" value="{!! $department->sort !!}" required>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </section>
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection
