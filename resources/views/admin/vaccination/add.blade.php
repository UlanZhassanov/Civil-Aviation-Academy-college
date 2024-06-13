@extends('admin.layouts.app')
@php $parrentCat  = 'Вакцинация' @endphp
@php $active_menu  = 'Добавление' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Добавить вакцинированных</h1>
    <div class="filter">
        <form action="{{ route('admin.vaccination.store') }}" method="POST">
			  @csrf
            <div>
                <label for="quantity">Вакцинировано за сегодняшний день</label>
                <input type="number" class="form-control" name="quantity" value="{!! $data->quantity !!}">
					 <small id="emailHelp" class="form-text text-muted">Корректировка возможна 1 раз в 24 часа.</small>
            </div>
            <div>
                <label for="students">Всего обучающихся:</label>
                <input type="number" class="form-control" name="students" value="{!! $data->students !!}">
            </div>
            <div>
                <label for="quantity">Дата добавления</label>
                <input type="text" class="form-control" name="date" readonly value="{{ $today }}" required>
            </div>
            <div>
                <button>Добавить</button>
            </div>
        </form>
    </div>
@endsection
