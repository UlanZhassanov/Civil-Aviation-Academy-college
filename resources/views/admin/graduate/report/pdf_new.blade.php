<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Панель администратора</title>
    <!-- Styles -->
    <link href="{{ asset('css/app-admin.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        h1 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            width: 100%;
        }

        h1 span {
            float: right;
        }

        h2,
        h3,
        h4 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        table {
            width: 100%;
            font-size: 10px;
            border-collapse: collapse;
        }

        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        .wrapper {
            max-width: 1170px;
            margin: 0 auto;
            padding-bottom: 50px;
        }

        .bg-chair {
            background: lightgrey !important;
        }

        .bg-chair-night {
            background: darkslategray !important;
            color: white;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="report">
            <h1>Выпускники бакалавриат, магистратура 2022г.<span> {!! $today->format('d.m.Y') !!}</span></h1>
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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
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
            </table>
        </div>
    </div>
