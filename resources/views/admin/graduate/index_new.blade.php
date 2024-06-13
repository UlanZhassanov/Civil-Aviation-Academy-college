@extends('admin.layouts.app')
@php $parrentCat  = 'Выпускники' @endphp
@php $active_menu  = 'Все' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <h1>Все выпускники</h1>
    <h2>Фильтр и сортировка</h2>
    <div class="filter">
        <form action="{{ route('admin.graduate.graduates.index_new') }}">
            @csrf
            <div>
                <label for="form_study">Форма обучения</label>
                <select name="form_study">
                    <option value=""></option>
                    <option value="грант" @if ($form_study === 'грант') selected @endif>Грант</option>
                    <option value="платное" @if ($form_study === 'платное') selected @endif>Платное</option>
                </select>
            </div>
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
                <label for="type">Академическая степень</label>
                <select name="type">
                    <option value=""></option>
                    <option value="1" @if ($type === '1') selected @endif>
                        Бакалавриат</option>
                    <option value="2" @if ($type === '2') selected @endif>
                        Магистратура</option>
                    <option value="3" @if ($type === '3') selected @endif>
                        Докторантура</option>
                </select>
            </div>
            {{-- <div>
                <label for="reference">Справка</label>
                <select name="reference">
                    <option value=""></option>
                    <option value="1" @if ($reference === '1') selected @endif>Да</option>
                    <option value="0" @if ($reference === '0') selected @endif>Нет</option>
                </select>
            </div> --}}
            <div>
                <label for="employment_type">Вид трудоустройства</label>
                <select name="employment_type">
                    <option value=""></option>
                    <option value="Трудоустроен, по специальности" @if ($employment_type === 'Трудоустроен, по специальности') selected @endif>Трудоустроен, по специальности</option>
                    <option value="Трудоустроен, в авиации" @if ($employment_type === 'Трудоустроен, в авиации') selected @endif>Трудоустроен, в авиации</option>
                    <option value="Трудоустроен, не в авиации" @if ($employment_type === 'Трудоустроен, не в авиации') selected @endif>Трудоустроен, не в авиации</option>
                </select>
            </div>
            <div>
                <label for="have_portfolio">Портфолио</label>
                <select name="have_portfolio">
                    <option value=""></option>
                    <option value="Отсутствует" @if ($have_portfolio === 'Отсутствует') selected @endif>Нет
                    </option>
                    <option value="Имеется" @if ($have_portfolio === 'Имеется') selected @endif>
                        Да</option>
                </select>
            </div>
            {{-- <div>
                <label for="direction">Направление</label>
                <select name="direction">
                    <option value=""></option>
                    <option value="1" @if ($direction === '1') selected @endif>Да</option>
                    <option value="0" @if ($direction === '0') selected @endif>Нет</option>
                </select>
            </div> --}}
            {{-- <div>
                <label for="work">Имеется работа</label>
                <select name="work">
                    <option value=""></option>
                    <option value="1" @if ($work === '1') selected @endif>Да
                    </option>
                    <option value="0" @if ($work === '0') selected @endif>Нет
                    </option>
                </select>
            </div> --}}
            <div>
                <label for="graduate_status">Статус выпускника</label>
                <select name="graduate_status">
                    <option value=""></option>
                    <option value="Трудоустроен" @if ($graduate_status === 'Трудоустроен') selected @endif>Трудоустроен</option>
                    <option value="Призван в ряды вооруженных сил" @if ($graduate_status === 'Призван в ряды вооруженных сил') selected @endif>Призван в ряды вооруженных сил</option>
                    <option value="Отпуск по уходу за ребенком курс" @if ($graduate_status === 'Отпуск по уходу за ребенком курс') selected @endif>Отпуск по уходу за ребенком курс</option>
                    <option value="Повторный курс обучения" @if ($graduate_status === 'Повторный курс обучения') selected @endif>Повторный курс обучения</option>
                    <option value="Выдано направление" @if ($graduate_status === 'Выдано направление') selected @endif>Выдано направление</option>
                    <option value="Нет обратной связи" @if ($graduate_status === 'Нет обратной связи') selected @endif>Нет обратной связи</option>
                </select>
            </div>
            <div>
                <label for="grad_year">Год выпуска</label>
                <select name="grad_year">
                    <option value=""></option>
                    <option value="2022" @if ($grad_year === '2022') selected @endif>2022</option>
                </select>
            </div>
            <div>
                <button>Применить</button>
            </div>
        </form>
    </div>
    <br /><br />
    <h2>Поиск</h2>
    <div class="filter">
        <form action="{{ route('admin.graduate.graduates.index_new') }}" method="GET">
            @csrf
            <div>
                <label for="surname">Поиск по фамилии</label>
                <input type="text" name="surname">
            </div>
            <div>
                <label for="iin">ИИН</label>
                <input type="text" name="iin">
            </div>
            <div>
                <button>Найти</button>
            </div>
            <div>
                <a href="{{ route('admin.graduate.graduates.index_new') }}"><button>Сбросить фильтры</button></a>
            </div>
        </form>
    </div>
    <h3>Всего выпускников: {!! $countData !!}</h3>
    @include('admin.graduate.table_new')
@endsection
