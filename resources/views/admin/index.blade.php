@extends('admin.layouts.app')
@php $parrentCat  = '' @endphp
@php $active_menu  = '' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Админ-панель</h1>
@endsection
