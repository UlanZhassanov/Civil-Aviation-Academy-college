@extends('admin.layouts.app')
@php $parrentCat  = 'Выпускники' @endphp
@php $active_menu  = 'Добавление выпускников (2021)' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <h1>Добавление выпускников</h1>
    <form action="{{ route('admin.graduate.graduates.store') }}" method="POST">
        @csrf
        <div class="blocks">
            <div class="block">
                <h5 class="block__title">Фамилия</h5>
                <input type="text" class="block__info" name="surname">
            </div>
            <div class="block">
                <h5 class="block__title">Имя</h5>
                <input type="text" class="block__info" name="name">
            </div>
            <div class="block">
                <h5 class="block__title">Отчество</h5>
                <input type="text" class="block__info" name="patronymic">
            </div>
            <div class="block">
                <h5 class="block__title">Группа</h5>
                <input type="text" class="block__info" name="groupe">
            </div>
            <div class="block">
                <h5 class="block__title">Общая группа</h5>
                <select class="block__info" name="unification">
                    <option value="">-----</option>
                    <option value="АТ-(МХ)">АТ-(МХ)</option>
                    <option value="АТ-(АВ)">АТ-(АВ)</option>
                    <option value="АТ-(ОНО)">АТ-(ОНО)</option>
                    <option value="АТ-АБ">АТ-АБ</option>
                    <option value="АТ-ОВД">АТ-ОВД</option>
                    <option value="ОП-ЛГ">ОП-ЛГ</option>
                    <option value="ОП">ОП</option>
                    <option value="Д-ЛЭ">Д-ЛЭ</option>
                    <option value="Д-МХ">Д-МХ</option>
                    <option value="Д-АВ">Д-АВ</option>
                    <option value="Д-ОВД">Д-ОВД</option>
                    <option value="Д-АБ">Д-АБ</option>
                    <option value="Д-ОНО">Д-ОНО</option>
                    <option value="Д-ОП">Д-ОП</option>
                    <option value="Д-ОП-ЛГ">Д-ОП-ЛГ</option>
                    <option value="МП-АТ">МП-АТ</option>
                    <option value="МП-ТУ">МП-ТУ</option>
                    <option value="МНП-ТУ">МНП-ТУ</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">GPA</h5>
                <input type="text" class="block__info" name="gpa">
            </div>
            <div class="block">
                <h5 class="block__title">ИИН</h5>
                <input type="text" class="block__info" name="iin">
            </div>
            <div class="block">
                <h5 class="block__title">Форма обучения</h5>
                <select class="block__info" name="form_study">
                    <option value="">-----</option>
                    <option value="грант">грант</option>
                    <option value="платное">платное</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Адрес прописки</h5>
                <textarea rows="5" class="block__info" name="reg_address"></textarea>
            </div>
            <div class="block">
                <h5 class="block__title">Адрес проживания</h5>
                <textarea rows="5" class="block__info" name="res_address"></textarea>
            </div>
            <div class="block">
                <h5 class="block__title">Регион</h5>
                <select class="block__info" name="region">
                    <option value="">-----</option>
                    <option value="г. Алматы">г. Алматы</option>
                    <option value="г. Астана">г. Астана</option>
                    <option value="г. Шымкент">г. Шымкент</option>
                    <option value="Акмолинская обл.">Акмолинская обл.</option>
                    <option value="Актюбинская обл.">Актюбинская обл.</option>
                    <option value="Алматинская обл.">Алматинская обл.</option>
                    <option value="Атырауская обл.">Атырауская обл.</option>
                    <option value="Восточно-Казахстанская обл.">Восточно-Казахстанская обл.</option>
                    <option value="Жамбыльская обл.">Жамбыльская обл.</option>
                    <option value="Западно-Казахстанская обл.">Западно-Казахстанская обл.</option>
                    <option value="Карагандинская обл.">Карагандинская обл.</option>
                    <option value="Костанайская обл.">Костанайская обл.</option>
                    <option value="Кызылординская обл.">Кызылординская обл.</option>
                    <option value="Мангистауская обл.">Мангистауская обл.</option>
                    <option value="Павлодарская обл.">Павлодарская обл.</option>
                    <option value="Северо-Казахстанская обл.">Северо-Казахстанская обл.</option>
                    <option value="Туркестанская обл.">Туркестанская обл.</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Специальность</h5>
                <input type="text" class="block__info" name="speciality">
            </div>
            <div class="block">
                <h5 class="block__title">Поступление на магистратуру</h5>
                <select class="block__info" name="magister">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Работа</h5>
                <input type="text" class="block__info" name="work">
            </div>
            <div class="block">
                <h5 class="block__title">Получили справку</h5>
                <select class="block__info" name="reference">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Получили резюме</h5>
                <select class="block__info" name="resume">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Заполнены документы</h5>
                <select class="block__info" name="document">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Вручено направление</h5>
                <select class="block__info" name="direction">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Место 1</h5>
                <input type="text" name="directionPlace1" class="block__info">
            </div>
            <div class="block">
                <h5 class="block__title">Место 2</h5>
                <input type="text" name="directionPlace2" class="block__info">
            </div>
            <div class="block">
                <h5 class="block__title">Место 3</h5>
                <input type="text" name="directionPlace3" class="block__info">
            </div>
            <div class="block">
                <h5 class="block__title">Телефон</h5>
                <input type="text" name="phone" class="block__info">
            </div>
            <div class="block">
                <h5 class="block__title">Год окончания</h5>
                <select class="block__info" name="graduation_year">
                    <option value="">-----</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Квартал окончания</h5>
                <select class="block__info" name="quarter">
                    <option value="">-----</option>
                    <option value="1">1-й квартал</option>
                    <option value="2">2-й квартал</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Процесс</h5>
                <select name="process" class="block__info">
                    <option value="-----">-----</option>
                    <option value="Армия">Армия</option>
                    <option value="Декрет">Декрет</option>
                    <option value="Повторный курс">Повторный курс</option>
                    <option value="Выписано направление">Выписано направление</option>
                    <option value="Обработанный">Обработанный</option>
                </select>
            </div>
            <div class="block">
                <button type="submit" class="button">Добавить выпускника</button>
            </div>
    </form>
@endsection
