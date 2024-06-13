<table class="table-filter">
    <tr>
        <th>Ф.И.О.</th>
        <th>Группа</th>
        <th>Магистратура</th>
        <th>Справка</th>
        <th>Резюме</th>
        <th>Работа</th>
        <th>Направление</th>
        <th>Процесс</th>
        <th>Детализация</th>
    </tr>
    @foreach ($data as $item)
        <tr>
            <td>{!! $item->surname !!} {!! $item->name !!} {!! $item->patronimyc !!}</td>
            <td>{!! $item->groupe !!}</td>
            <td>
                @if ($item->magister === 0)
                    Нет
                @else
                    Да
                @endif
            </td>
            <td>
                @if ($item->reference === 0)
                    Нет
                @else
                    Да
                @endif
            </td>
            <td>
                @if ($item->resume === 0)
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
            <td>{!! $item->process !!}</td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#userModal{!! $item->id !!}">
                    Посмотреть
                </button>
            </td>
        </tr>
        <!-- Modal -->
        @include('admin.graduate.modal')
    @endforeach
</table>
<div style="margin-top: 20px">
    {{ $data->links('admin.pagination.default') }}
</div>
