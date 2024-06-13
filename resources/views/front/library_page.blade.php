@extends('front.layouts.app')
@section('title')Академия Гражданской Авиации@endsection
@section('content')
    <section id="pages">
        <div class="container">
            {{-- @include('front.inc.header_library') --}}
            <h1>
                {!! $data->title !!}
            </h1>
				<div class="breadcrumbs">
					<a href="{!! route('front.home') !!}">Главная</a>
					<span> > </span>
					<a href="{!! route('front.library') !!}">Библиотека</a>
					<span> > </span>
					<span>{!! $data->title !!}</span>
				</div>
            <div>еу4ке4
                {!! $data->desc !!}
            </div>
        </div>
    </section>
@endsection
