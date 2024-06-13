@component('mail::message')
    <h1 style="text-align: center">Анкета на поступление</h1>
    Уровень высшего обрзования: {{ $bachelor->type }} <br />
    Фамилия: {{ $bachelor->surname }} <br />
    Имя: {{ $bachelor->name }} <br />
    @if (isset($bachelor->patronymic))
        Отчество: {{ $bachelor->patronymic }} <br />
    @endif
    @if (isset($bachelor->iin))
        ИИН: {{ $bachelor->iin }} <br />
    @endif
    Гражданство: {{ $bachelor->citizen }} <br />
    @if (isset($bachelor->base))
        Поступление на базе: {{ $bachelor->base }} <br />
    @endif
    Образовательная программа: {{ $bachelor->programms }} <br />
    @if (isset($bachelor->haveENT))
        Имеется ЕНТ: {{ $bachelor->haveENT }} <br />
    @endif
    @if (isset($bachelor->quantENT))
        Количество предметов: {{ $bachelor->quantENT }} <br />
    @endif
    @if (isset($bachelor->readLit))
        Грамотность чтения: {{ $bachelor->readLit }} <br />
    @endif
    @if (isset($bachelor->historyKZ))
        История Казахстана: {{ $bachelor->historyKZ }} <br />
    @endif
    @if (isset($bachelor->mathLit))
        Математическая грамотность: {{ $bachelor->mathLit }} <br />
    @endif
    @if (isset($bachelor->math))
        Математика: {{ $bachelor->math }} <br />
    @endif
    @if (isset($bachelor->profSub))
        Профильный предмет: {{ $bachelor->profSub }} <br />
    @endif
    @if (isset($bachelor->natureSec))
        Охрана труда: {{ $bachelor->natureSec }} <br />
    @endif
    @if (isset($bachelor->aviaSec))
        Авиационная безопасность: {{ $bachelor->aviaSec }} <br />
    @endif
    @if (isset($bachelor->geography))
        География: {{ $bachelor->geography }} <br />
    @endif
    @if (isset($bachelor->physics))
        Физика: {{ $bachelor->physics }} <br />
    @endif
    @if ($bachelor->haveENT === 'Да')
        Всего баллов:
        {{ $bachelor->countENT }}
        <br />
    @endif
    Телефон: {{ $bachelor->phone_1 }} <br />
    @if (isset($bachelor->phone_2))
        Телефон: {{ $bachelor->phone_2 }} <br />
    @endif
    @if (isset($bachelor->region))
        Регион проживания: {{ $bachelor->region }} <br />
    @endif
    @if (isset($bachelor->countries))
        Страна: {{ $bachelor->countries }} <br />
    @endif
@endcomponent
