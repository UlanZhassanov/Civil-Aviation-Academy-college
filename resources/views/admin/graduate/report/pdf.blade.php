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
        }
		  .table-grant{
			  margin-bottom: 20px;
		  }
        .table-grant tr,
        .table-grant th,
        .table-grant td {
            padding: 10px 0;
        }
        .table-paid tr,
        .table-paid th,
        .table-paid td {
            padding: 2px 0;
        }

        tr,
        th,
        td {
            border: 1px solid black;
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
            <h1>Отчёт по трудоустройству выпускников<span> {!! $today->format('d.m.Y') !!}</span></h1>
            <table class="report table-grant">
                {{-- Грант --}}
                <tr>
                    <th colspan="2"></th>
                    <th colspan="3">Специальность</th>
                    <th colspan="1">Всего</th>
                    <th colspan="1">Магистратура</th>
                    <th colspan="1">Трудоустроенно</th>
                    <th colspan="1">Не трудоустроенны</th>
                    <th colspan="1">% трудоустройства</th>
                </tr>
                <tr>
                    <th rowspan="13">Грантники</th>
                    <td>1</td>
                    <td colspan="3">АТ-(МХ)</td>
                    <td>{!! $grant_at_mx !!}</td>
                    <td>{!! $grant_at_mx_magister !!}</td>
                    <td>{!! $grant_at_mx_work !!}</td>
                    <td>{!! $grant_at_mx_no_work !!}</td>
                    <td>{!! round($grant_at_mx_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td colspan="3">АТ-(АВ)</td>
                    <td>{!! $grant_at_mv !!}</td>
                    <td>{!! $grant_at_mv_magister !!}</td>
                    <td>{!! $grant_at_mv_work !!}</td>
                    <td>{!! $grant_at_mv_no_work !!}</td>
                    <td>{!! round($grant_at_mv_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td colspan="3">АТ-(ОНО)-17</td>
                    <td>{!! $grant_at_ono !!}</td>
                    <td>{!! $grant_at_ono_magister !!}</td>
                    <td>{!! $grant_at_ono_work !!}</td>
                    <td>{!! $grant_at_ono_no_work !!}</td>
                    <td>{!! round($grant_at_ono_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td colspan="3">АТ-(ОВД)-17</td>
                    <td>{!! $grant_at_ovd !!}</td>
                    <td>{!! $grant_at_ovd_magister !!}</td>
                    <td>{!! $grant_at_ovd_work !!}</td>
                    <td>{!! $grant_at_ovd_no_work !!}</td>
                    <td>{!! round($grant_at_ovd_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td colspan="3">АТ-(АБ)</td>
                    <td>{!! $grant_at_ab !!}</td>
                    <td>{!! $grant_at_ab_magister !!}</td>
                    <td>{!! $grant_at_ab_work !!}</td>
                    <td>{!! $grant_at_ab_no_work !!}</td>
                    <td>{!! round($grant_at_ab_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair">
                    <th colspan="4">АТ</th>
                    <th>{!! $grant_at !!}</th>
                    <th>{!! $grant_at_magister !!}</th>
                    <th>{!! $grant_at_work !!}</th>
                    <th>{!! $grant_at_no_work !!}</th>
                    <th>{!! round($grant_at_procent, 0) !!}</th>
                </tr>
                <tr>
                    <td>6</td>
                    <td colspan="3">ОП-ЛГ-17</td>
                    <td>{!! $grant_op_lg !!}</td>
                    <td>{!! $grant_op_lg_magister !!}</td>
                    <td>{!! $grant_op_lg_work !!}</td>
                    <td>{!! $grant_op_lg_no_work !!}</td>
                    <td>{!! round($grant_op_lg_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td colspan="3">ОП</td>
                    <td>{!! $grant_op !!}</td>
                    <td>{!! $grant_op_magister !!}</td>
                    <td>{!! $grant_op_work !!}</td>
                    <td>{!! $grant_op_no_work !!}</td>
                    <td>{!! round($grant_op_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair">
                    <th colspan="4">ОП</th>
                    <th>{!! $grant_op_all !!}</th>
                    <th>{!! $grant_op_all_magister !!}</th>
                    <th>{!! $grant_op_all_work !!}</th>
                    <th>{!! $grant_op_all_no_work !!}</th>
                    <th>{!! round($grant_op_all_procent, 0) !!}</th>
                </tr>
                <tr>
                    <td>8</td>
                    <td colspan="3">МНП-АТ-19</td>
                    <td>{!! $grant_mnp_at !!}</td>
                    <td>{!! $grant_mnp_at_magister !!}</td>
                    <td>{!! $grant_mnp_at_work !!}</td>
                    <td>{!! $grant_mnp_at_no_work !!}</td>
                    <td>{!! round($grant_mnp_at_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td colspan="3">МНП-ТУ-19</td>
                    <td>{!! $grant_mnp_tu !!}</td>
                    <td>{!! $grant_mnp_tu_magister !!}</td>
                    <td>{!! $grant_mnp_tu_work !!}</td>
                    <td>{!! $grant_mnp_tu_no_work !!}</td>
                    <td>{!! round($grant_mnp_tu_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td colspan="3">ДАТ-18</td>
                    <td>{!! $grant_dat !!}</td>
                    <td>{!! $grant_dat_magister !!}</td>
                    <td>{!! $grant_dat_work !!}</td>
                    <td>{!! $grant_dat_no_work !!}</td>
                    <td>{!! round($grant_dat_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair-night">
                    <th colspan="4">Всего</th>
                    <th>{!! $grant_all !!}</th>
                    <th>{!! $grant_all_magister !!}</th>
                    <th>{!! $grant_all_work !!}</th>
                    <th>{!! $grant_all_no_work !!}</th>
                    <th>{!! round($grant_all_procent, 0) !!}</th>
                </tr>
            </table>
            <table class="report table-paid">
                <tr>
                    <th colspan="2"></th>
                    <th colspan="3">Специальность</th>
                    <th colspan="1">Всего</th>
                    <th colspan="1">Магистратура</th>
                    <th colspan="1">Трудоустроенно</th>
                    <th colspan="1">Не трудоустроенны</th>
                    <th colspan="1">% трудоустройства</th>
                </tr>
                {{-- Платное --}}
                <tr>
                    <th rowspan="23">Платники</th>
                    <td>1</td>
                    <td colspan="3">АТ-(МХ)</td>
                    <td>{!! $paid_at_mx !!}</td>
                    <td>{!! $paid_at_mx_magister !!}</td>
                    <td>{!! $paid_at_mx_work !!}</td>
                    <td>{!! $paid_at_mx_no_work !!}</td>
                    <td>{!! round($paid_at_mx_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td colspan="3">АТ-(АВ)</td>
                    <td>{!! $paid_at_av !!}</td>
                    <td>{!! $paid_at_av_magister !!}</td>
                    <td>{!! $paid_at_av_work !!}</td>
                    <td>{!! $paid_at_av_no_work !!}</td>
                    <td>{!! round($paid_at_av_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td colspan="3">АТ-(ОНО)</td>
                    <td>{!! $paid_at_ono !!}</td>
                    <td>{!! $paid_at_ono_magister !!}</td>
                    <td>{!! $paid_at_ono_work !!}</td>
                    <td>{!! $paid_at_ono_no_work !!}</td>
                    <td>{!! round($paid_at_ono_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td colspan="3">АТ-АБ</td>
                    <td>{!! $paid_at_ab !!}</td>
                    <td>{!! $paid_at_ab_magister !!}</td>
                    <td>{!! $paid_at_ab_work !!}</td>
                    <td>{!! $paid_at_ab_no_work !!}</td>
                    <td>{!! round($paid_at_ab_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td colspan="3">АТ-ОВД</td>
                    <td>{!! $paid_at_ovd !!}</td>
                    <td>{!! $paid_at_ovd_magister !!}</td>
                    <td>{!! $paid_at_ovd_work !!}</td>
                    <td>{!! $paid_at_ovd_no_work !!}</td>
                    <td>{!! round($paid_at_ovd_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair">
                    <th colspan="4">АТ</th>
                    <td>{!! $paid_at !!}</td>
                    <td>{!! $paid_at_magister !!}</td>
                    <td>{!! $paid_at_work !!}</td>
                    <td>{!! $paid_at_no_work !!}</td>
                    <td>{!! round($paid_at_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td colspan="3">ОП-ЛГ</td>
                    <td>{!! $paid_op_lg !!}</td>
                    <td>{!! $paid_op_lg_magister !!}</td>
                    <td>{!! $paid_op_lg_work !!}</td>
                    <td>{!! $paid_op_lg_no_work !!}</td>
                    <td>{!! round($paid_op_lg_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td colspan="3">ОП</td>
                    <td>{!! $paid_op !!}</td>
                    <td>{!! $paid_op_magister !!}</td>
                    <td>{!! $paid_op_work !!}</td>
                    <td>{!! $paid_op_no_work !!}</td>
                    <td>{!! round($paid_op_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair">
                    <th colspan="4">ОП</th>
                    <td>{!! $paid_op_all !!}</td>
                    <td>{!! $paid_op_all_magister !!}</td>
                    <td>{!! $paid_op_all_work !!}</td>
                    <td>{!! $paid_op_all_no_work !!}</td>
                    <td>{!! round($paid_op_all_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td colspan="3">Д-ЛЭ</td>
                    <td>{!! $paid_d_le !!}</td>
                    <td>{!! $paid_d_le_magister !!}</td>
                    <td>{!! $paid_d_le_work !!}</td>
                    <td>{!! $paid_d_le_no_work !!}</td>
                    <td>{!! round($paid_d_le_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td colspan="3">Д-МХ</td>
                    <td>{!! $paid_d_mx !!}</td>
                    <td>{!! $paid_d_mx_magister !!}</td>
                    <td>{!! $paid_d_mx_work !!}</td>
                    <td>{!! $paid_d_mx_no_work !!}</td>
                    <td>{!! round($paid_d_mx_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td colspan="3">Д-АВ</td>
                    <td>{!! $paid_d_av !!}</td>
                    <td>{!! $paid_d_av_magister !!}</td>
                    <td>{!! $paid_d_av_work !!}</td>
                    <td>{!! $paid_d_av_no_work !!}</td>
                    <td>{!! round($paid_d_av_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td colspan="3">Д-ОВД</td>
                    <td>{!! $paid_d_ovd !!}</td>
                    <td>{!! $paid_d_ovd_magister !!}</td>
                    <td>{!! $paid_d_ovd_work !!}</td>
                    <td>{!! $paid_d_ovd_no_work !!}</td>
                    <td>{!! round($paid_d_ovd_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td colspan="3">Д-АБ</td>
                    <td>{!! $paid_d_ab !!}</td>
                    <td>{!! $paid_d_ab_magister !!}</td>
                    <td>{!! $paid_d_ab_work !!}</td>
                    <td>{!! $paid_d_ab_no_work !!}</td>
                    <td>{!! round($paid_d_ab_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td colspan="3">Д-ОНО</td>
                    <td>{!! $paid_d_ono !!}</td>
                    <td>{!! $paid_d_ono_magister !!}</td>
                    <td>{!! $paid_d_ono_work !!}</td>
                    <td>{!! $paid_d_ono_no_work !!}</td>
                    <td>{!! round($paid_d_ono_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair">
                    <td colspan="4">Д-АТ</td>
                    <td>{!! $paid_dat !!}</td>
                    <td>{!! $paid_dat_magister !!}</td>
                    <td>{!! $paid_dat_work !!}</td>
                    <td>{!! $paid_dat_no_work !!}</td>
                    <td>{!! round($paid_dat_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td colspan="3">Д-ОП</td>
                    <td>{!! $paid_d_op !!}</td>
                    <td>{!! $paid_d_op_magister !!}</td>
                    <td>{!! $paid_d_op_work !!}</td>
                    <td>{!! $paid_d_op_no_work !!}</td>
                    <td>{!! round($paid_d_op_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td colspan="3">Д-ОП-ЛГ</td>
                    <td>{!! $paid_d_op_lg !!}</td>
                    <td>{!! $paid_d_op_lg_magister !!}</td>
                    <td>{!! $paid_d_op_lg_work !!}</td>
                    <td>{!! $paid_d_op_lg_no_work !!}</td>
                    <td>{!! round($paid_d_op_lg_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair">
                    <td colspan="4">Д-ОП</td>
                    <td>{!! $paid_d_op_all !!}</td>
                    <td>{!! $paid_d_op_all_magister !!}</td>
                    <td>{!! $paid_d_op_all_work !!}</td>
                    <td>{!! $paid_d_op_all_no_work !!}</td>
                    <td>{!! round($paid_d_op_all_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td colspan="3">МП-АТ</td>
                    <td>{!! $paid_mp_at !!}</td>
                    <td>{!! $paid_mp_at_magister !!}</td>
                    <td>{!! $paid_mp_at_work !!}</td>
                    <td>{!! $paid_mp_at_no_work !!}</td>
                    <td>{!! round($paid_mp_at_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td colspan="3">МП-ТУ</td>
                    <td>{!! $paid_mp_tu !!}</td>
                    <td>{!! $paid_mp_tu_magister !!}</td>
                    <td>{!! $paid_mp_tu_work !!}</td>
                    <td>{!! $paid_mp_tu_no_work !!}</td>
                    <td>{!! round($paid_mp_tu_procent, 0) !!}</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td colspan="3">МНП-ТУ</td>
                    <td>{!! $paid_mnp_tu !!}</td>
                    <td>{!! $paid_mnp_tu_magister !!}</td>
                    <td>{!! $paid_mnp_tu_work !!}</td>
                    <td>{!! $paid_mnp_tu_no_work !!}</td>
                    <td>{!! round($paid_mnp_tu_procent, 0) !!}</td>
                </tr>
                <tr class="bg-chair-night">
                    <th colspan="4">Всего</th>
                    <th>{!! $paid_all !!}</th>
                    <th>{!! $paid_all_magister !!}</th>
                    <th>{!! $paid_all_work !!}</th>
                    <th>{!! $paid_all_no_work !!}</th>
                    <th>{!! round($paid_all_procent, 0) !!}</th>
                </tr>
                <tr class="bg-chair-night">
                    <th colspan="5">Итого</th>
                    <th>{!! $all !!}</th>
                    <th>{!! $all_magister !!}</th>
                    <th>{!! $all_work !!}</th>
                    <th>{!! $all_no_work !!}</th>
                    <th>{!! round($all_procent, 0) !!}</th>
                </tr>
            </table>
        </div>
    </div>
