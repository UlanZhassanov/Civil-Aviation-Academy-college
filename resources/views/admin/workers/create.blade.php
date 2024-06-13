@extends('admin.layouts.app')
@php $parrentCat  = 'Управление работниками' @endphp
@php $active_menu  = 'Добавить работника' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Добавление работника</h1>
    <section id="pages">
        <form action="{{ route('admin.workers.store') }}" method="POST">
            @csrf
            <div class="d-flex flex-wrap mb-4">
                <div class="col-md-4 mb-2 pl-0">
                    <label>Фамилия</label>
                    <input class="form-control" type="text" placeholder="Введите Фамилию" name="surname" required>
                </div>
                <div class="col-md-4 mb-2 pl-1">
                    <label>Имя</label>
                    <input class="form-control" type="text" placeholder="Введите Имя" name="name" required>
                </div>
                <div class="col-md-4 mb-2 pl-1">
                    <label>Отчество</label>
                    <input class="form-control" type="text" placeholder="Введите Отчество (если имеется)" name="patronymic" required>
                </div>
                <div class="col-md-4 mb-2 pl-0">
                    <label>ИИН</label>
                    <input class="form-control" type="text" placeholder="Введите ИИН" name="iin" required>
                </div>
                <div class="col-md-4 mb-2 pl-1">
                    <label>Пароль</label>
                    <input class="form-control" type="password" placeholder="Введите Пароль" name="password" required>
                </div>
                <div class="col-md-4 mb-2 pl-1">
                    <label>Email</label>
                    <input class="form-control" type="email" placeholder="Введите Email" name="email" required>
                </div>
                <div class="col-md-4 mb-2 pl-0">
                    <label>Личный телефон</label>
                    <input class="form-control" type="text" placeholder="Введите телефон в формате 77777777777" name="phone" required>
                </div>
                <div class="col-md-4 mb-2 pl-1">
                    <label>Отдел</label>
                    <input class="form-control" type="text" placeholder="Введите Отдел" name="department" required>
                </div>
                <div class="col-md-4 mb-2 pl-1">
                    <label>Должность</label>
                    <input class="form-control" type="text" placeholder="Введите Должность" name="position" required>
                </div>
            </div>
            <div class="block text-center">
                <button type="submit" class="btn btn-primary">Добавить сотрудника</button>
            </div>
        </form>
    </section>
@endsection
