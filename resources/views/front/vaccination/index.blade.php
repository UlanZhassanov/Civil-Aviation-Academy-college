@extends('layouts.app')
@section('title')Статистика вакцинации в Академии Гражданской Авиации@endsection
@section('content')
    <div class="preview">
        <div class="preview__body preview__item" style="text-align: left">
				<h2 style="font-size: 32px;text-align:center">Статистика вакцинации</h2><br/><br/>
            <p>
					Количество обучающихся в Академии: {!! $data->students !!}
				</p>
            <p>
					Количество вакцинированных: {!! $data->quantity !!}
				</p>
            <p>
					Доля вакцинированных на {!! date('d.m.Y', strtotime($data->created_at)) !!}: {!! $percentVaccination !!} %
				</p><br/>
        </div>
    </div>
@endsection
