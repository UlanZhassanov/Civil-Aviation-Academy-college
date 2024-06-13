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
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Образовательная программа</th>
                    <th>балл ЕНТ</th>
                </tr>

                @foreach ($data as $item)
                    <tr>
                        <td>{!! $item->num_row !!}</td>
                        <td>{!! $item->surname !!} {!! $item->name !!} {!! $item->patronymic !!}</td>
                        <td>{!! $item->programms !!}</td>
                        <td>{!! $item->countENT !!}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
