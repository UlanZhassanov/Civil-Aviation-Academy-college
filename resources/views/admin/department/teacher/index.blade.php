@extends('admin.layouts.app')
@php $parrentCat  = 'Кафедры' @endphp
@php $active_menu  = 'Преподаватели' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Преподаватели</h1>
    <a href="{{ route('admin.department.teacher.create') }}">
        Добавить преподавателя
    </a>
@endsection
