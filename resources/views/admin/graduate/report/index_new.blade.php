@extends('admin.layouts.app')
@php $parrentCat  = 'Выпускники' @endphp
@php $active_menu = 'Отчёт выпускники';
@endphp
@section('content')
    <div class="report">
        <h2>Выпускники бакалавриат, магистратура  2022г.</h2>
        <h3>Скачать в <a href="{{route('admin.graduate.report.pdf_new')}}">PDF</a> | <a href="{{route('admin.graduate.report.excel')}}">Excel</a></h3>
        <table class="report">
            <tr style="background: #00249c;color: #fff;">
                <th rowspan="2">№ п/п</th>
                <th rowspan="2">Образовательная программа</th>
                <th rowspan="2">Очная форма обучения</th>
                <th rowspan="2">ДОТ</th>
                <th rowspan="2">Выпуск 2022</th>
                <th colspan="5">Трудоустроены</th>
                <th rowspan="2">Не трудоустроены</th>
            </tr>
            <tr style="background: #00249c;color: #fff;">
                <th>грант</th>
                <th>платное</th>
                <th>ДОТ</th>
                <th>Всего</th>
                <th>%</th>
            </tr>
            @foreach ($dataBachInzh as $item)
                <tr style="background-color: darkseagreen">
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach
            @foreach ($dataBachB067 as $item)
                <tr style="background-color: lightblue">
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach
            @foreach ($dataBachB067op as $item)
                <tr>
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach
            @foreach ($dataBachB167 as $item)
                <tr style="background-color: lightblue">
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach
            @foreach ($dataBachB167op as $item)
                <tr>
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach
            @foreach ($dataBachTransport as $item)
                <tr style="background-color: lightblue">
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach
            @foreach ($dataBachTransportOp as $item)
                <tr>
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach

            @foreach ($dataBachAll as $item)
                <tr class="bg-chair">
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->speciality !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach

            <tr style="background: #00249c;color: #fff;">
                <th></th>
                <th>Магистратура</th>
                <th colspan="11"></th>
            </tr>
            @foreach ($dataMag as $item)
                <tr>
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->op_group !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach

            @foreach ($dataMagAll as $item)
                <tr class="bg-chair">
                    <td>{!! $item->num_row !!}</td>
                    <td>{!! $item->op_group !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach

            @foreach ($dataAll as $item)
                <tr class="bg-chair-night">
                    <td colspan="2">{!! $item->op_group !!}</td>
                    <td>{!! $item->ochnoe !!}</td>
                    <td>{!! $item->dot !!}</td>
                    <td>{!! $item->vse !!}</td>
                    <td>{!! $item->work_grant !!}</td>
                    <td>{!! $item->work_platn !!}</td>
                    <td>{!! $item->work_dot !!}</td>
                    <td>{!! $item->work_vse !!}</td>
                    <td>{!! $item->percent !!}</td>
                    <td>{!! $item->notwork_vse !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
