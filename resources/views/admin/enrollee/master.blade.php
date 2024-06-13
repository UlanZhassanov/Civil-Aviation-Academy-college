@extends('admin.layouts.app')
@php $parrentCat  = 'Абитуриенты' @endphp
@php $active_menu  = 'Магистратура' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Абитуриенты на Магистратуру</h1>
    <h2>Фильтр и сортировка</h2>
    <div class="filter">
        <form action="{{ route('admin.enrollee.master.index') }}">
            @csrf
            <div>
                <label for="citizen">Гражданство</label>
                <select name="citizen">
                    <option value=""></option>
                    <option value="Резидент РК" @if ($citizen === 'Резидент РК') selected @endif>Резидент РК</option>
                    <option value="Нерезидент РК" @if ($citizen === 'Нерезидент РК') selected @endif>Нерезидент РК</option>
                </select>
            </div>
            <div>
                <label for="programms">Образовательная программа</label>
                <select name="programms">
                    <option value=""></option>
                    <option value="Авиационная техника и технологии (профильная магистратура)" @if ($programms === 'Авиационная техника и технологии (профильная магистратура)') selected @endif>Авиационная техника и
                        технологии (профильная магистратура)</option>
                    <option value="Авиационная техника и технологии (научно-педагогическая магистратура)" @if ($programms === 'Авиационная техника и технологии (научно-педагогическая магистратура)') selected @endif>Авиационная
                        техника и технологии (научно-педагогическая магистратура)</option>
                    <option value="Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)" @if ($programms === 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)') selected @endif>Летная
                        эксплуатация летательных аппаратов и двигателей (профильная магистратура)</option>
                    <option
                        value="Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)"
                        @if ($programms === 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)') selected @endif>
                        Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)</option>
                    <option value="Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)" @if ($programms === 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)') selected @endif>
                        Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)</option>
                    <option
                        value="Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)"
                        @if ($programms === 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)') selected @endif>
                        Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)
                    </option>
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
                <label for="created_at_from">Дата подачи с</label>
                <input type="date" name="created_at_from"
                 @if ($created_at_from != '') value="{!! $created_at_from !!}" @endif>
            </div>
            <div>
                <label for="created_at_to">Дата подачи до</label>
                <input type="date" name="created_at_to"
                 @if ($created_at_to != '') value="{!! $created_at_to !!}" @endif>
            </div>
            <div>
                <label for="process">Процесс</label>
                <select name="process">
                    <option value=""></option>
                    <option value="Не дозвонились" @if ($process === 'Не дозвонились') selected @endif>Не дозвонились</option>
                    <option value="В обработке" @if ($process === 'В обработке') selected @endif>В обработке</option>
                    <option value="Обработанный" @if ($process === 'Обработанный') selected @endif>Обработанные</option>
                    <option value="Сдал документы" @if ($process === 'Сдал документы') selected @endif>Сдал документы</option>
                    <option value="Отказ" @if ($process === 'Отказ') selected @endif>Отказ</option>
                </select>
            </div>
            <div>
                <label for="sort">Сортировать</label>
                <select name="sort">
                    <option value=""></option>
                    <option value="surname" @if ($sort === 'surname') selected @endif>По фамилии</option>
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
        <form action="{{ route('admin.enrollee.master.index') }}" method="GET">
            @csrf
            <div>
                <label for="surname">Поиск по фамилии</label>
                <input type="text" name="surname">
            </div>
            <div>
                <button>Найти</button>
            </div>
            <div>
                <a href="{{ route('admin.enrollee.master.index') }}"><button>Сбросить фильтры</button></a>
            </div>
            <div>
                <a href="{{ route('admin.enrollee.documents.pdf').'?type=Магистратура'.str_replace('?','&',str_replace(Request::url(), '', Request::fullUrl())) }}" class="button">Выгрузка PDF</a>
            </div>
        </form>
    </div>
    <h3>Всего анкет: {!! $countData !!}</h3>
    <table class="table-filter">
        <tr>
            <th>Дата подачи</th>
            <th>ФИО</th>
            <th>Баллы по КТ</th>
            <th>Процесс</th>
            <th>№ дела</th>
            <th>Детально</th>
        </tr>
        @if (isset($data))
            @foreach ($data as $item)
                <tr>
                    <td>{!! date('d.m.Y H:i', strtotime($item->created_at)) !!}</td>
                    <td>{!! $item->surname !!} {!! $item->name !!} {!! $item->patronymic !!}</td>
                    <td>{!! $item->countKT !!}</td>
                    <td>{!! $item->process !!}</td>
                    <td>{!! $item->case_number !!}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal{!! $item->applid !!}">
                            Посмотреть
                        </button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="userModal{!! $item->applid !!}" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.enrollee.master.update', $item->applid) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{!! $item->applid !!}">
                                    <div class="blocks">
                                        <div class="block">
                                            <h5 class="block__title">Фамилия</h5>
                                            <input type="text" value="{!! $item->surname !!}" name="surname" class="block__info">
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Имя</h5>
                                            <input type="text" value="{!! $item->name !!}" name="name"
                                                class="block__info">
                                        </div>
                                        @if (isset($item->patronymic))
                                            <div class="block">
                                                <h5 class="block__title">Отчество</h5>
                                                <input type="text" value="{!! $item->patronymic !!}" name="patronymic"
                                                    class="block__info">
                                            </div>
                                        @endif
                                        @if ($item->birthdate !== NULL)
                                        <div class="block">
                                            <h5 class="block__title">Дата рождения</h5>
                                            <p class="block__info">
                                                {!! date('d.m.Y', strtotime($item->birthdate)) !!}
                                            </p>
                                        </div>
                                        @endif
                                        @if ($item->gender !== NULL)
                                        <div class="block">
                                            <h5 class="block__title">Пол</h5>
                                            <p class="block__info">
                                                {!! $item->gender !!}
                                            </p>
                                        </div>
                                        @endif
                                        @if ($item->nationality_id !== NULL)
                                        <div class="block">
                                            <h5 class="block__title">Национальность</h5>
                                            <p class="block__info">
                                                {!! mb_strtolower($item->nationality_ru, 'UTF-8') !!}
                                            </p>
                                        </div>
                                        @endif
                                        <div class="block">
                                            <h5 class="block__title">Гражданство</h5>
                                            <p class="block__info">{!! $item->citizen !!}</p>
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Язык обучения</h5>
                                            <select name="lang_edu" class="block__info">
                                                <option @if ($item->lang_edu === NULL or $item->lang_edu === "-") selected value="{{$item->lang_edu}}" @endif>-</option>
                                                <option value="Казахский"
                                                    @if ($item->lang_edu === 'Казахский') selected @endif>Казахский
                                                </option>
                                                <option value="Русский"
                                                    @if ($item->lang_edu === 'Русский') selected @endif>
                                                    Русский</option>
                                                <option value="Английский"
                                                    @if ($item->lang_edu === 'Английский') selected @endif>
                                                    Английский</option>
                                            </select>
                                        </div>
                                        @if (isset($item->iin))
                                            <div class="block">
                                                <h5 class="block__title">ИИН</h5>
                                                <input type="text" value="{!! $item->iin !!}" name="iin"
                                                    class="block__info">
                                            </div>
                                        @endif
                                        <div class="block">
                                            <h5 class="block__title">Дата подачи</h5>
                                            <p class="block__info">{!! date('d.m.Y H:i', strtotime($item->created_at)) !!}</p>
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Образовательная программа</h5>
                                            <select name="programms" class="block__info" id="programms">
                                                <option value="-----" @if ($item->programms === null) selected @endif>-----</option>
                                                <option value="Авиационная техника и технологии (профильная магистратура)"
                                                    @if ($item->programms === 'Авиационная техника и технологии (профильная магистратура)') selected @endif>
                                                    Авиационная техника и
                                                    технологии (профильная магистратура)</option>
                                                <option
                                                    value="Авиационная техника и технологии (научно-педагогическая магистратура)"
                                                    @if ($item->programms === 'Авиационная техника и технологии (научно-педагогическая магистратура)') selected @endif>
                                                    Авиационная
                                                    техника и технологии (научно-педагогическая магистратура)</option>
                                                <option
                                                    value="Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)"
                                                    @if ($item->programms === 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)') selected @endif>
                                                    Летная эксплуатация летательных аппаратов и двигателей
                                                    (научно-педагогическая
                                                    магистратура)</option>
                                                <option
                                                    value="Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)"
                                                    @if ($item->programms === 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)') selected @endif>
                                                    Летная эксплуатация летательных аппаратов и двигателей
                                                    (профильная магистратура)</option>
                                                <option
                                                    value="Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)"
                                                    @if ($item->programms === 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)') selected @endif>
                                                    Организация перевозок, движения и эксплуатация транспорта (профильная
                                                    магистратура)</option>
                                                <option
                                                    value="Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)"
                                                    @if ($item->programms === 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)') selected @endif>
                                                    Организация перевозок, движения и эксплуатация транспорта
                                                    (научно-педагогическая
                                                    магистратура)
                                                </option>
                                            </select>
                                        </div>
                                        @if (isset($item->countries))
                                            <div class="block">
                                                <h5 class="block__title">Страна</h5>
                                                <p class="block__info">{!! $item->countries !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->region))
                                            <div class="block">
                                                <h5 class="block__title">Регион</h5>
                                                <p class="block__info">{!! $item->region !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->tgo_magister))
                                            <div class="block">
                                                <h5 class="block__title">Тест на готовность к обучению</h5>
                                                <p class="block__info">{!! $item->tgo_magister !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->prof_sub_magister_1))
                                            <div class="block">
                                                <h5 class="block__title">1-й проф. предмет</h5>
                                                <p class="block__info">{!! $item->prof_sub_magister_1 !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->prof_sub_magister_2))
                                            <div class="block">
                                                <h5 class="block__title">2-й проф. предмет</h5>
                                                <p class="block__info">{!! $item->prof_sub_magister_2 !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->eng_magister))
                                            <div class="block">
                                                <h5 class="block__title">Английский язык</h5>
                                                <p class="block__info">{!! $item->eng_magister !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->countKT))
                                            <div class="block">
                                                <h5 class="block__title">Итого баллов</h5>
                                                <p class="block__info">{!! $item->countKT !!}</p>
                                            </div>
                                        @endif
                                        <div class="block">
                                            <h5 class="block__title">Телефон 1</h5>
                                            <input type="text" value="{!! $item->phone_1 !!}" name="phone_1"
                                                class="block__info" id="phone_1">
                                        </div>
                                        @if (isset($item->phone_2))
                                            <div class="block">
                                                <h5 class="block__title">Телефон 2</h5>
                                                <input type="text" value="{!! $item->phone_2 !!}" name="phone_2"
                                                    class="block__info" id="phone_2">
                                            </div>
                                        @endif
                                        <div class="block">
                                            <h5 class="block__title">E-mail</h5>
                                            <p class="block__info">{!! $item->email !!}</p>
                                        </div>
                                        @if (isset($item->case_number))
                                            <div class="block">
                                                <h5 class="block__title">№ дела</h5>
                                                <p class="block__info">{!! $item->case_number !!}</p>
                                            </div>
                                        @endif
                                        <div class="block">
                                            <h5 class="block__title">Процесс</h5>
                                            <select name="process" class="block__info" id="process">
                                                <option value="-----" @if ($item->process === null) selected @endif>-----</option>
                                                <option value="Не дозвонились" @if ($item->process === 'Не дозвонились') selected @endif>Не дозвонились</option>
                                                <option value="В обработке" @if ($item->process === 'В обработке') selected @endif>В обработке</option>
                                                <option value="Обработанный" @if ($item->process === 'Обработанный') selected @endif>Обработанный</option>
                                                <option value="Сдал документы" @if ($item->process === 'Сдал документы') selected @endif>Сдал документы</option>
                                                <option value="Отказ" @if ($item->process === 'Отказ') selected @endif>Отказ</option>
                                            </select>
                                        </div>
                                        <div class="block">
                                            <button type="submit" class="button">Сохранить изменения</button>
                                        </div>
                                </form>
                                <div class="block">
                                    <form action="{{ route('admin.enrollee.master.edit', $item->applid) }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="id" value="{!! $item->applid !!}">
                                        <button type="submit" class="button"
                                            onclick="return confirm('Удалить?')">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            Абитуриентов не найдено
        @endif
    </table>
    <div style="margin-top: 20px">
        {{ $data->links('admin.pagination.default') }}
    </div>
@endsection
