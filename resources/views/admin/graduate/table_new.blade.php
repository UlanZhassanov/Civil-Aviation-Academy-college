<table class="table-filter">
    <tr>
        <th>Ф.И.О.</th>
        <th>Академическая степень</th>
        <th>Группа</th>
        <th>Справка</th>
        <th>Портфолио</th>
        <th>Работа</th>
        <th>Направление</th>
        <th>Статус выпускника</th>
        <th>Детализация</th>
    </tr>
    @foreach ($data as $item)
        <tr>
            <td>{!! $item->surname !!} {!! $item->name !!} {!! $item->patronimyc !!}</td>
            <td>@if ($item->type === 1)
                    Бакалавриат
                @elseif ($item->type === 2)
                    Магистратура
                @elseif ($item->type === 3)
                    Докторантура
                @else
                    {!! $item->type !!}
                @endif
            </td>
            <td>{!! $item->groupe !!}</td>
            <td>
                @if ($item->reference === 0)
                    Нет
                @else
                    Да
                @endif
            </td>
            <td>
                @if ($item->have_portfolio === "Отсутствует" || $item->have_portfolio === NULL)
                    Нет
                @else
                    Да
                @endif
            </td>
            <td>{!! Str::limit($item->work_place, 20) !!}</td>
            <td>
                @if ($item->direction === 0)
                    Нет
                @else
                    Да
                @endif
            </td>
            <td>{!! $item->graduate_status !!}</td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#userModal{!! $item->id !!}">
                    Посмотреть
                </button>
            </td>
        </tr>
        <!-- Modal -->
        @include('admin.graduate.modal_new')
    @endforeach
</table>
<div style="margin-top: 20px">
    {{ $data->links('admin.pagination.default') }}
</div>
