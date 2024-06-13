@extends('admin.layouts.app')
@php $parrentCat  = 'Абитуриенты' @endphp
@php $active_menu  = 'Документы' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Документы для поступления абитуриентов</h1>
    <h2>Поиск абитуриентов</h2>
    <div class="filter">
        <form action="{{ route('admin.enrollee.documents.index') }}" method="GET">
            @csrf
            <div>
                <label for="iin">ИИН</label>
                <input type="text" name="iin">
            </div>
            <div>
                <label for="surname">Фамилия</label>
                <input type="text" name="surname">
            </div>
            <br>
            <div>
                <button>Найти</button>
            </div>
            <div>
                <a href="{{ route('admin.enrollee.documents.index') }}"><button>Сбросить фильтры</button></a>
            </div>
            <div>
                <a href="{{ route('admin.enrollee.documents.pdfdocs').'?status=0&page='.$data->currentPage() }}" class="button">Выгрузка PDF</a>
            </div>
        </form>
    </div>

    <h3>Всего анкет: {!! $countData !!}</h3>
    <table class="table-filter">
        <tr>
            <th>Дата</th>
            <th>ФИО</th>
            <th>Степень</th>
            <th>Процесс</th>
            <th>№ дела</th>
            <th>Документы</th>
            <th>Детально</th>
        </tr>
        @if (isset($data))
            @foreach ($data as $item)
                <tr>
                    <td>{!! date('d.m.Y H:i', strtotime($item->created_at)) !!}</td>
                    <td>{!! $item->surname !!} {!! $item->name !!} {!! $item->patronymic !!}</td>
                    <td>{!! $item->type !!}</td>
                    <td>
                        @if ($item->process === null)
                            -----
                        @else
                            {!! $item->process !!}
                        @endif
                    </td>
                    <td>{!! $item->case_number !!}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#docsModal{!! $item->applid !!}">
                            Сформировать
                        </button>
                        {{-- <a href="{{ url('admin/enrollee/documents/word-applicationForCredits/' . $item->id) }}" class="btn btn-info">Сформировать(word)</a> --}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#userModal{!! $item->applid !!}">
                            Посмотреть
                        </button>
                    </td>
                </tr>

                <!-- Modal for export docs -->
                <div class="modal fade" id="docsModal{!! $item->applid !!}" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="block__info">{!! $item->surname !!} {!! $item->name !!}
                                    {!! $item->patronymic !!}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div>
                                        <h5 class="block__info">Двусторонний договор
                                            <a href="{{ url('admin/enrollee/documents/word-bilateralAgreement/' . $item->applid) }}"
                                                class="btn btn-info float-right">Скачать(.docx)</a>
                                        </h5>
                                    </div>
                                    <hr>
                                    <div class="block">
                                        <h5 class="block__info">Личное дело
                                            <a href="{{ url('admin/enrollee/documents/word-statements/' . $item->applid) }}"
                                                class="btn btn-info float-right">Скачать(.docx)</a>
                                        </h5>
                                    </div>
                                    <hr>
                                    <div>
                                        <h5 class="block__info">Заявление
                                            <a href="{{ url('admin/enrollee/documents/word-applicationForCredits/' . $item->applid) }}"
                                                class="btn btn-info float-right">Скачать(.docx)</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Info Modal -->
                <div class="modal fade" id="userModal{!! $item->applid !!}" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.enrollee.documents.update', $item->applid) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{!! $item->applid !!}">
                                    <div class="blocks">
                                        <div class="block">
                                            <h5 class="block__title">Фамилия</h5>
                                            <input type="text" value="{!! $item->surname !!}" name="surname"
                                                class="block__info">
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Имя</h5>
                                            <input type="text" value="{!! $item->name !!}" name="name"
                                                class="block__info">
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Отчество</h5>
                                            <input type="text" value="{!! $item->patronymic !!}" name="patronymic"
                                                class="block__info">
                                        </div>
                                        @if ($item->birthdate !== null)
                                            <div class="block">
                                                <h5 class="block__title">Дата рождения</h5>
                                                <p class="block__info">
                                                    {!! date('d.m.Y', strtotime($item->birthdate)) !!}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($item->gender !== null)
                                            <div class="block">
                                                <h5 class="block__title">Пол</h5>
                                                <p class="block__info">
                                                    {!! $item->gender !!}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($item->nationality_id !== null)
                                            <div class="block">
                                                <h5 class="block__title">Национальность</h5>

                                                <select name="nationality_id" class="block__info">
                                                    @foreach ($nationality_list as $nationality)
                                                        {{-- @if (Config::get('app.locale') == 'kk')
                                                            <option value="{{ $nationality->id }}" @if ($item->nationality_id === $nationality->id) selected @endif>
                                                                {{ mb_strtolower($nationality->nationality_kz, 'UTF-8') }}
                                                            </option>
                                                        @elseif (Config::get('app.locale') == 'ru') --}}
                                                        <option value="{{ $nationality->id }}"
                                                            @if ($item->nationality_id === $nationality->id) selected @endif>
                                                            {{ mb_strtolower($nationality->nationality_ru, 'UTF-8') }}
                                                        </option>
                                                        {{-- @else
                                                            <option value="{{ $nationality->id }}" @if ($item->nationality_id === $nationality->id) selected @endif>
                                                                {{ mb_strtolower($nationality->nationality_en, 'UTF-8') }}
                                                            </option>
                                                        @endif --}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="block">
                                            <h5 class="block__title">Гражданство</h5>
                                            <p class="block__info">{!! $item->citizen !!}</p>
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Язык обучения</h5>
                                            <select name="lang_edu" class="block__info">
                                                <option
                                                    @if ($item->lang_edu === null or $item->lang_edu === '-') selected value="{{ $item->lang_edu }}" @endif>
                                                    -</option>
                                                <option value="Казахский"
                                                    @if ($item->lang_edu === 'Казахский') selected @endif>Казахский
                                                </option>
                                                <option value="Русский" @if ($item->lang_edu === 'Русский') selected @endif>
                                                    Русский</option>
                                                <option value="Английский" @if ($item->lang_edu === 'Английский') selected @endif>
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
                                            <p class="block__info">{!! date('d.m.Y H:m', strtotime($item->created_at)) !!}</p>
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">На базе</h5>
                                            <select name="base" class="block__info">
                                                <option value="11-го класса"
                                                    @if ($item->base === '11-го класса') selected @endif>11-го класса
                                                </option>
                                                <option value="Технического и профессионального образования (колледжа)"
                                                    @if ($item->base === 'Технического и профессионального образования (колледжа)') selected @endif>
                                                    Технического
                                                    и профессионального образования (колледжа)</option>
                                                <option value="Высшего образования"
                                                    @if ($item->base === 'Высшего образования') selected @endif>Высшего образования
                                                </option>
                                            </select>
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Образовательная программа</h5>
                                            <select name="programms" class="block__info">
                                                <option value="null">
                                                    -----
                                                </option>
                                                @if ($item->type === 'Бакалавриат')
                                                <option value="Лётная эксплуатация гражданских самолетов (пилот)"
                                                    @if ($item->programms === 'Лётная эксплуатация гражданских самолетов (пилот)') selected @endif>
                                                    Лётная эксплуатация гражданских самолетов (пилот)
                                                </option>
                                                <option value="Лётная эксплуатация гражданских вертолетов (пилот)"
                                                    @if ($item->programms === 'Лётная эксплуатация гражданских вертолетов (пилот)') selected @endif>
                                                    Лётная эксплуатация гражданских вертолетов (пилот)
                                                </option>
                                                <option value="Обслуживание воздушного движения и аэронавигационное обеспечение полетов"
                                                    @if ($item->programms === 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') selected @endif>
                                                    Обслуживание воздушного движения и аэронавигационное обеспечение полетов
                                                </option>
                                                <!-- B067 Воздушный транспорт и технологии -->
                                                <option
                                                    value="Техническая эксплуатация систем авионики летательных аппаратов и двигателей"
                                                    @if ($item->programms === 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей') selected @endif>
                                                    Техническая эксплуатация систем авионики летательных аппаратов и
                                                    двигателей
                                                </option>
                                                <option value="Техническая эксплуатация летательных аппаратов и двигателей"
                                                    @if ($item->programms === 'Техническая эксплуатация летательных аппаратов и двигателей') selected @endif>
                                                    Техническая
                                                    эксплуатация летательных аппаратов и двигателей
                                                </option>
                                                <option value="Обеспечение авиационной безопасности"
                                                    @if ($item->programms === 'Обеспечение авиационной безопасности') selected @endif>Обеспечение
                                                    авиационной
                                                    безопасности
                                                </option>
                                                <option
                                                    value="Обслуживание наземного радиоэлектронного оборудования аэропортов"
                                                    @if ($item->programms === 'Обслуживание наземного радиоэлектронного оборудования аэропортов') selected @endif>
                                                    Обслуживание наземного радиоэлектронного оборудования аэропортов
                                                </option>
                                                <option value="Организация аэропортовой деятельности"
                                                    @if ($item->programms === 'Организация аэропортовой деятельности') selected @endif>Организация
                                                    аэропортовой
                                                    деятельности
                                                </option>
                                                <!-- B095 Транспортные услуги -->
                                                <option value="Организация авиационных перевозок"
                                                    @if ($item->programms === 'Организация авиационных перевозок') selected @endif>
                                                    Организация авиационных перевозок
                                                </option>
                                                <option value="Логистика на транспорте"
                                                    @if ($item->programms === 'Логистика на транспорте') selected @endif>Логистика на
                                                    транспорте
                                                </option>
                                                <option value="Технология транспортных процессов в авиации"
                                                    @if ($item->programms === 'Технология транспортных процессов в авиации') selected @endif>Технология
                                                    транспортных процессов в авиации
                                                </option>
                                                @elseif ($item->type === 'Магистратура')
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
                                                @elseif ($item->type === 'Докторантура')
                                                <option value="Авиационная техника и технологии" @if ($item->programms === 'Авиационная техника и технологии') selected @endif>Авиационная техника и технологии
                                                </option>
                                                @endif

                                            </select>
                                        </div>
                                        @if (isset($item->haveENT))
                                            <div class="block">
                                                <h5 class="block__title">Имеется ЕНТ</h5>
                                                <p class="block__info">{!! $item->haveENT !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->quantENT))
                                            <div class="block">
                                                <h5 class="block__title">Количество предметов</h5>
                                                <p class="block__info">{!! $item->quantENT !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->mathLit))
                                            <div class="block">
                                                <h5 class="block__title">Математическая грамотность</h5>
                                                <input type="text" value="{!! $item->mathLit !!}" name="mathLit" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->readLit))
                                            <div class="block">
                                                <h5 class="block__title">Грамотность чтения</h5>
                                                <input type="text" value="{!! $item->readLit !!}" name="readLit" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->historyKZ))
                                            <div class="block">
                                                <h5 class="block__title">История Казахстана</h5>
                                                <input type="text" value="{!! $item->historyKZ !!}" name="historyKZ" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->math))
                                            <div class="block">
                                                <h5 class="block__title">Математика</h5>
                                                <input type="text" value="{!! $item->math !!}" name="math" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->profSub))
                                            <div class="block">
                                                <h5 class="block__title">Профильный предмет</h5>
                                                <p class="block__info">{!! $item->profSub !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->aviaSec))
                                            <div class="block">
                                                <h5 class="block__title">Авиационная безопасность</h5>
                                                <input type="text" value="{!! $item->aviaSec !!}" name="aviaSec" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->natureSec))
                                            <div class="block">
                                                <h5 class="block__title">Охрана труда</h5>
                                                <input type="text" value="{!! $item->natureSec !!}" name="natureSec" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->geography))
                                            <div class="block">
                                                <h5 class="block__title">География</h5>
                                                <input type="text" value="{!! $item->geography !!}" name="geography" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->physics))
                                            <div class="block">
                                                <h5 class="block__title">Физика</h5>
                                                <input type="text" value="{!! $item->physics !!}" name="physics" class="block__info">
                                            </div>
                                        @endif
                                        @if (isset($item->haveVLEK))
                                            <div class="block">
                                                <h5 class="block__title">Имеется ВЛЭК</h5>
                                                <p class="block__info">{!! $item->haveVLEK !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->imgVLEK))
                                            <div class="block">
                                                <h5 class="block__title">ВЛЭК</h5>
                                                <p class="block__info">
                                                    <a href="{!! $item->imgVLEK !!}" target="_blank">ВЛЭК</a>
                                                </p>
                                            </div>
                                        @elseif ($item->haveVLEK === 'Нет' && !isset($item->imgVLEK))
                                            <div class="block" id="vlekBlockImage">
                                                <h5 class="block__title">Прикрепить пройденный ВЛЭК</h5>
                                                <input type="file" id="vlekImage" class="block__info"
                                                    name="vlekImage">
                                            </div>
                                        @endif
                                        @if (isset($item->imgPSYCHO))
                                            <div class="block">
                                                <h5 class="block__title">Психотест</h5>
                                                <p class="block__info">
                                                    <a href="{!! $item->imgPSYCHO !!}" target="_blank">Психотест</a>
                                                </p>
                                            </div>
                                        @elseif ($item->haveVLEK !== null && !isset($item->imgPSYCHO))
                                            <div class="block" id="psychoBlockImage">
                                                <h5 class="block__title">Прикрепить пройденный психотест</h5>
                                                <input type="file" name="psychoImage" id="psychoImage"
                                                    class="block__info" onchange="vlekImageFunc()">
                                            </div>
                                        @endif
                                        @if (isset($item->haveIELTS))
                                            <div class="block">
                                                <h5 class="block__title">Имеется IELTS/TOEFL</h5>
                                                <p class="block__info">{!! $item->haveIELTS !!}</p>
                                            </div>
                                        @endif
                                        @if (isset($item->imgIELTS))
                                            <div class="block">
                                                <h5 class="block__title">IELTS/TOEFL</h5>
                                                <p class="block__info">
                                                    <a href="{!! $item->imgIELTS !!}" target="_blank">IELTS/TOEFL</a>
                                                </p>
                                            </div>
                                        @endif
                                        @if ($item->countENT !== 0)
                                            <div class="block">
                                                <h5 class="block__title">Всего баллов</h5>
                                                <input type="text" value="{!! $item->countENT !!}" name="countENT" class="block__info">
                                            </div>
                                        @endif
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
                                        <div class="block">
                                            <h5 class="block__title">Телефон 1</h5>
                                            <input type="text" value="{!! $item->phone_1 !!}" name="phone_1"
                                                class="block__info">
                                        </div>
                                        @if (isset($item->phone_2))
                                            <div class="block">
                                                <h5 class="block__title">Телефон 2</h5>
                                                <input type="text" value="{!! $item->phone_2 !!}" name="phone_2"
                                                    class="block__info">
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
                                            <select name="process" class="block__info">
                                                <option value="-----" @if ($item->process === null) selected @endif>
                                                    -----</option>
                                                <option value="Не дозвонились"
                                                    @if ($item->process === 'Не дозвонились') selected @endif>Не дозвонились
                                                </option>
                                                <option value="В обработке"
                                                    @if ($item->process === 'В обработке') selected @endif>В обработке</option>
                                                <option value="Обработанный"
                                                    @if ($item->process === 'Обработанный') selected @endif>Обработанный
                                                </option>
                                                <option value="Сдал документы"
                                                    @if ($item->process === 'Сдал документы') selected @endif>Сдал документы
                                                </option>
                                                <option value="Отказ" @if ($item->process === 'Отказ') selected @endif>
                                                    Отказ</option>
                                            </select>
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Параметры расписки</h5>
                                            <div class="block__info">
                                                <label for="statement">
                                                    <input type='hidden' value='0' name='statement'>
                                                    <input type="checkbox" name="statement" value="1"
                                                        @if ($item->statement === 1) checked @else unchecked @endif />
                                                    Заявление</label>
                                            </div>
                                            <div class="block__info">
                                                <label for="attestat">
                                                    <input type='hidden' value='0' name='attestat'>
                                                    <input type="checkbox" name="attestat" value="1"
                                                        @if ($item->attestat_or_diplom === 1) checked @else unchecked @endif />
                                                    Аттестат (диплом) и приложение к
                                                    аттестату (диплому)
                                                </label>
                                            </div>
                                            <div class="block__info">
                                                <label for="photo">
                                                    <input type='hidden' value='0' name='photo'>
                                                    <input type="checkbox" name="photo" value="1"
                                                        @if ($item->photo3x4 === 1) checked @else unchecked @endif />
                                                    Фотокарточки размером
                                                    3x4</label>
                                            </div>
                                            <div class="block__info">
                                                <label for="med">
                                                    <input type='hidden' value='0' name='med'>
                                                    <input type="checkbox" name="med" value="1"
                                                        @if ($item->medical_certificate === 1) checked @else unchecked @endif />
                                                    Медицинская справка Ф-075/У,
                                                    заключение ВЛЭК</label>
                                            </div>
                                            <div class="block__info">
                                                <label for="ent">
                                                    <input type='hidden' value='0' name='ent'>
                                                    <input type="checkbox" name="ent" value="1"
                                                        @if ($item->ent_certificate === 1) checked @else unchecked @endif />
                                                    Сертификат ЕНТ </label>
                                            </div>
                                            <div class="block__info">
                                                <label for="grant">
                                                    <input type='hidden' value='0' name='grant'>
                                                    <input type="checkbox" name="grant" value="1"
                                                        @if ($item->grant_certificate === 1) checked @else unchecked @endif />
                                                    Свидетельство гранта </label>
                                            </div>
                                            <div class="block__info">
                                                <label for="udostov">
                                                    <input type='hidden' value='0' name='udostov'>
                                                    <input type="checkbox" name="udostov" value="1"
                                                        @if ($item->udostov_copy === 1) checked @else unchecked @endif />
                                                    Копия удостоверения
                                                    личности</label>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <h5 class="block__title">Грант</h5>

                                            <label for="grant" class="block__info">
                                                <input type="radio" id="grant_yes" name="grant" value="1" @if ($item->have_grant === 1) checked @endif>
                                            Да</label><br>

                                            <label for="grant" class="block__info">
                                                <input type="radio" id="grant_no" name="grant" value="0" @if ($item->have_grant === 0) checked @endif>
                                            Нет</label><br>
                                        </div>
                                    </div>
                                    <div class="blocks">
                                        <div class="block" style="border: none;">
                                            <button type="submit" class="button">Сохранить изменения</button>
                                        </div>
                                </form>
                                <div class="blocks">
                                    <div class="block" style="border: none;width: 100%;">
                                        <form action="{{ route('admin.enrollee.bachelor.edit', $item->applid) }}"
                                            method="GET">
                                            @csrf
                                            <button type="submit" class="button"
                                                onclick="return confirm('Удалить?')">Удалить</button>
                                        </form>
                                    </div>
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
