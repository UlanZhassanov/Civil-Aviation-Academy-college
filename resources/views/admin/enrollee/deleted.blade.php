@extends('admin.layouts.app')
@php $parrentCat  = 'Абитуриенты' @endphp
@php $active_menu  = 'Удалённые' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{{ session('alert') }}</h3>
        </div>
    @endif
    <h1>Удаленные анкеты</h1>
    <h3>Всего анкет: {!! $countData !!}</h3>
    <table class="table-filter">
        <tr>
            <th>Дата подачи</th>
            <th>Дата удаления</th>
            <th>ФИО</th>
            <th>Телефон 1</th>
            <th style="text-align: revert">Телефон 2</th>
            <th style="text-align: right">Детально</th>
        </tr>
        @if (isset($data))
            @foreach ($data as $item)
                <tr>
                    <td>{!! date('d.m.Y H:i', strtotime($item->created_at)) !!}</td>
                    <td>{!! date('d.m.Y H:i', strtotime($item->updated_at)) !!}</td>
                    <td>{!! $item->surname !!} {!! $item->name !!} {!! $item->patronymic !!}</td>
                    <td>{!! $item->phone_1 !!}</td>
                    <td style="text-align: revert">{!! $item->phone_2 !!}</td>
                    <td style="text-align: right">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#userModal{!! $item->id !!}">
                            Посмотреть
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="userModal{!! $item->id !!}" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="blocks">
                                    <div class="block">
                                        <h5 class="block__title">Поступает на</h5>
                                        <p class="block__info">{!! $item->type !!}</p>
                                    </div>
                                    @if (isset($item->base))
                                        <div class="block">
                                            <h5 class="block__title">На базе</h5>
                                            <p class="block__info">{!! $item->base !!}</p>
                                        </div>
                                    @endif
                                    <div class="block">
                                        <h5 class="block__title">Гражданство</h5>
                                        <p class="block__info">{!! $item->citizen !!}</p>
                                    </div>
                                    <div class="block">
                                        <h5 class="block__title">Фамилия</h5>
                                        <p class="block__info">{!! $item->surname !!}</p>
                                    </div>
                                    <div class="block">
                                        <h5 class="block__title">Имя</h5>
                                        <p class="block__info">{!! $item->name !!}</p>
                                    </div>
                                    @if (isset($item->patronymic))
                                        <div class="block">
                                            <h5 class="block__title">Отчество</h5>
                                            <p class="block__info">{!! $item->patronymic !!}</p>
                                        </div>
                                    @endif
                                    @if (isset($item->iin))
                                        <div class="block">
                                            <h5 class="block__title">ИИН</h5>
                                            <p class="block__info">{!! $item->iin !!}</p>
                                        </div>
                                    @endif
                                    <div class="block">
                                        <h5 class="block__title">Дата подачи</h5>
                                        <p class="block__info">{!! date('d.m.Y H:m', strtotime($item->created_at)) !!}</p>
                                    </div>
                                    <div class="block">
                                        <h5 class="block__title">Образовательная программа</h5>
                                        <p class="block__info">{!! $item->programms !!}</p>
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
                                            <p class="block__info">{!! $item->mathLit !!}</p>
                                        </div>
                                    @endif
                                    @if (isset($item->readLit))
                                        <div class="block">
                                            <h5 class="block__title">Грамотность чтения</h5>
                                            <p class="block__info">{!! $item->readLit !!}</p>
                                        </div>
                                    @endif
                                    @if (isset($item->historyKZ))
                                        <div class="block">
                                            <h5 class="block__title">История Казахстана</h5>
                                            <p class="block__info">{!! $item->historyKZ !!}</p>
                                        </div>
                                    @endif
                                    @if (isset($item->math))
                                        <div class="block">
                                            <h5 class="block__title">Математика</h5>
                                            <p class="block__info">{!! $item->math !!}</p>
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
                                            <p class="block__info">{!! $item->aviaSec !!}</p>
                                        </div>
                                    @endif
                                    @if (isset($item->natureSec))
                                        <div class="block">
                                            <h5 class="block__title">Охрана труда</h5>
                                            <p class="block__info">{!! $item->natureSec !!}</p>
                                        </div>
                                    @endif
                                    @if (isset($item->geography))
                                        <div class="block">
                                            <h5 class="block__title">География</h5>
                                            <p class="block__info">{!! $item->geography !!}</p>
                                        </div>
                                    @endif
                                    @if (isset($item->physics))
                                        <div class="block">
                                            <h5 class="block__title">Физика</h5>
                                            <p class="block__info">{!! $item->physics !!}</p>
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
                                    @endif
                                    @if (isset($item->imgPSYCHO))
                                        <div class="block">
                                            <h5 class="block__title">Психотест</h5>
                                            <p class="block__info">
                                                <a href="{!! $item->imgPSYCHO !!}" target="_blank">Психотест</a>
                                            </p>
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
                                            <p class="block__info">{!! $item->countENT !!}</p>
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
                                        <p class="block__info">{!! $item->phone_1 !!}</p>
                                    </div>
                                    @if (isset($item->phone_2))
                                        <div class="block">
                                            <h5 class="block__title">Телефон 2</h5>
                                            <p class="block__info">{!! $item->phone_2 !!}</p>
                                        </div>
                                    @endif
                                    <div class="block">
                                        <h5 class="block__title">E-mail</h5>
                                        <p class="block__info">{!! $item->email !!}</p>
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
