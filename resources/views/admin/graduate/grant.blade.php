@extends('admin.layouts.app')
@php $parrentCat  = 'Выпускники' @endphp
@php $active_menu  = 'Грант' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <h1>Выпускники-грантники</h1>
    <h2>Фильтр и сортировка</h2>
    <div class="filter">
        <form action="{{ route('admin.graduate.grant') }}">
            @csrf
            <div>
                <label for="region">Регион</label>
                <select name="region">
                    <option value=""></option>
                    <option value="г. Алматы" @if ($region === 'г. Алматы') selected @endif>г. Алматы</option>
                    <option value="г. Астана" @if ($region === 'г. Астана') selected @endif>г. Астана</option>
                    <option value="г. Шымкент" @if ($region === 'г. Шымкент') selected @endif>г. Шымкент</option>
                    <option value="Абайская обл." @if ($region === 'Абайская обл.') selected @endif>Абайская обл.
                    </option>
                    <option value="Акмолинская обл." @if ($region === 'Акмолинская обл.') selected @endif>Акмолинская обл.
                    </option>
                    <option value="Актюбинская обл." @if ($region === 'Актюбинская обл.') selected @endif>Актюбинская обл.
                    </option>
                    <option value="Алматинская обл." @if ($region === 'Алматинская обл.') selected @endif>Алматинская обл.
                    </option>
                    <option value="Атырауская обл." @if ($region === 'Атырауская обл.') selected @endif>Атырауская обл.
                    </option>
                    <option value="Восточно-Казахстанская обл." @if ($region === 'Восточно-Казахстанская обл.') selected @endif>
                        Восточно-Казахстанская обл.</option>
                    <option value="Жамбыльская обл." @if ($region === 'Жамбыльская обл.') selected @endif>Жамбыльская обл.
                    </option>
                    <option value="Жетысуская обл." @if ($region === 'Жетысуская обл.') selected @endif>Жетысуская обл.
                    </option>
                    <option value="Западно-Казахстанская обл." @if ($region === 'Западно-Казахстанская обл.') selected @endif>
                        Западно-Казахстанская обл.</option>
                    <option value="Карагандинская обл." @if ($region === 'Карагандинская обл.') selected @endif>Карагандинская
                        обл.</option>
                    <option value="Костанайская обл." @if ($region === 'Костанайская обл.') selected @endif>Костанайская обл.
                    </option>
                    <option value="Кызылординская обл." @if ($region === 'Кызылординская обл.') selected @endif>Кызылординская
                        обл.</option>
                    <option value="Мангистауская обл." @if ($region === 'Мангистауская обл.') selected @endif>Мангистауская
                        обл.</option>
                    <option value="Павлодарская обл." @if ($region === 'Павлодарская обл.') selected @endif>Павлодарская обл.
                    </option>
                    <option value="Северо-Казахстанская обл." @if ($region === 'Северо-Казахстанская обл.') selected @endif>
                        Северо-Казахстанская обл.</option>
                    <option value="Туркестанская обл." @if ($region === 'Туркестанская обл.') selected @endif>Туркестанская
                        обл.</option>
                    <option value="Улытауская обл." @if ($region === 'Улытауская обл.') selected @endif>Улытауская обл.</option>
                </select>
            </div>
            <div>
                <label for="magister">Магистратура</label>
                <select name="magister">
                    <option value=""></option>
                    <option value="1" @if ($magister === '1') selected @endif>
                        Да</option>
                    <option value="0" @if ($magister === '0') selected @endif>
                        Нет</option>
                </select>
            </div>
            <div>
                <label for="reference">Справка</label>
                <select name="reference">
                    <option value=""></option>
                    <option value="1" @if ($reference === '1') selected @endif>Да</option>
                    <option value="0" @if ($reference === '0') selected @endif>Нет</option>
                </select>
            </div>
            <div>
                <label for="resume">Резюме</label>
                <select name="resume">
                    <option value=""></option>
                    <option value="1" @if ($resume === '1') selected @endif>Да
                    </option>
                    <option value="0" @if ($resume === '0') selected @endif>
                        Нет</option>
                </select>
            </div>
            <div>
                <label for="direction">Направление</label>
                <select name="direction">
                    <option value=""></option>
                    <option value="1" @if ($direction === '1') selected @endif>Да</option>
                    <option value="0" @if ($direction === '0') selected @endif>Нет</option>
                </select>
            </div>
            <div>
                <label for="work">Имеется работа</label>
                <select name="work">
                    <option value=""></option>
                    <option value="1" @if ($work === '1') selected @endif>Да
                    </option>
                    <option value="0" @if ($work === '0') selected @endif>Нет
                    </option>
                </select>
            </div>
            <div>
                <label for="unification">Общая группа</label>
                <select name="unification">
                    <option value=""></option>
                    <option value="АТ-(МХ)" @if ($unification === 'АТ-(МХ)') selected @endif>АТ-(МХ)</option>
                    <option value="АТ-(АВ)" @if ($unification === 'АТ-(АВ)') selected @endif>АТ-(АВ)</option>
                    <option value="АТ-(ОНО)" @if ($unification === 'АТ-(ОНО)') selected @endif>АТ-(ОНО)</option>
                    <option value="АТ-АБ" @if ($unification === 'АТ-АБ') selected @endif>АТ-АБ</option>
                    <option value="АТ-ОВД" @if ($unification === 'АТ-ОВД') selected @endif>АТ-ОВД</option>
                    <option value="ОП-ЛГ" @if ($unification === 'ОП-ЛГ') selected @endif>ОП-ЛГ</option>
                    <option value="ОП" @if ($unification === 'ОП') selected @endif>ОП</option>
                    <option value="Д-ЛЭ" @if ($unification === 'Д-ЛЭ') selected @endif>Д-ЛЭ</option>
                    <option value="Д-МХ" @if ($unification === 'Д-МХ') selected @endif>Д-МХ</option>
                    <option value="Д-АВ" @if ($unification === 'Д-АВ') selected @endif>Д-АВ</option>
                    <option value="Д-ОВД" @if ($unification === 'Д-ОВД') selected @endif>Д-ОВД</option>
                    <option value="Д-АБ" @if ($unification === 'Д-АБ') selected @endif>Д-АБ</option>
                    <option value="Д-ОНО" @if ($unification === 'Д-ОНО') selected @endif>Д-ОНО</option>
                    <option value="Д-ОП" @if ($unification === 'Д-ОП') selected @endif>Д-ОП</option>
                    <option value="Д-ОП-ЛГ" @if ($unification === 'Д-ОП-ЛГ') selected @endif>Д-ОП-ЛГ</option>
                    <option value="МНП-АТ" @if ($unification === 'МНП-АТ') selected @endif>МНП-АТ</option>
                    <option value="МНП-ТУ" @if ($unification === 'МНП-ТУ') selected @endif>МНП-ТУ</option>
                    <option value="МП-ТУ" @if ($unification === 'МП-ТУ') selected @endif>МП-ТУ</option>
                    <option value="ДОК-АТ" @if ($unification === 'ДОК-АТ') selected @endif>ДОК-АТ</option>
                </select>
            </div>
            <div>
                <label for="process">Процесс</label>
                <select name="process">
                   <option value=""></option>
                   <option value="Армия" @if ($process === 'Армия') selected @endif>Армия</option>
                   <option value="Декрет" @if ($process === 'Декрет') selected @endif>Декрет</option>
                   <option value="Повторный курс" @if ($process === 'Повторный курс') selected @endif>Повторный курс</option>
                   <option value="Выписано направление" @if ($process === 'Выписано направление') selected @endif>Выписано направление</option>
                   <option value="Обработанный" @if ($process === 'Обработанный') selected @endif>Обработанные</option>
                </select>
            </div>
            <div>
                <button>Применить</button>
            </div>
        </form>
    </div>
    <br/><br/>
    <h2>Поиск</h2>
    <div class="filter">
        <form action="{{ route('admin.graduate.grant') }}" method="GET">
            @csrf
            <div>
                <label for="surname">Поиск по фамилии</label>
                <input type="text" name="surname">
            </div>
            <div>
                <button>Найти</button>
            </div>
            <div>
                <a href="{{ route('admin.graduate.grant') }}"><button>Сбросить фильтры</button></a>
            </div>
        </form>
    </div>
    <h3>Всего выпускников: {!! $countData !!}</h3>
    @include('admin.graduate.table')
@endsection
