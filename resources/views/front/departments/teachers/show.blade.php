@extends('front.layouts.app')
@section('title')
    {{ __('Кафедры') }}
@endsection
@section('content')
    <section id="department">
        <div class="container">
            <h1>
                {{ __('Кафедры') }}
            </h1>
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">{{ __('Главная') }}</a>
                <span> > </span>
                <a href="{!! route('front.departments.index') !!}">{{ __('Кафедры') }}</a>
                <span> > </span>
                <a href="{!! route('front.departments.show', $department->slug) !!}">{!! __($department->name) !!}</a>
                <span> > </span>
                <a href="{!! route('front.departments.show', $department->slug) !!}/teachers">{!! __('Профессорско-преподавательский состав') !!}</a>
                <span> > </span>
                <span>
                    {!! $teacher->surname !!}
                    {!! $teacher->name !!}
                    {!! $teacher->patronymic !!}
                </span>
            </div>
            <div class="d-flex">
                <div class="col-md-4 col-sm-12 pl-0">
                    <img src="{!! $teacher->photo !!}" class="w-100" alt="">
                    <div class="title">
                        <h4 class="pt-2">
                            {!! $teacher->surname !!}
                            {!! $teacher->name !!}
                            {!! $teacher->patronymic !!}
                        </h4>
                        <h5>
                            Занимаемая должность: <b>{!! $teacher->position !!}</b>
                        </h5>
                        <h5>Мобильный номер телефона:
                            <a href="tel:8{!! $teacher->phone !!}">8{!! $teacher->phone !!}</a>
                        </h5>
                        <h5>
                            Корпоративная почта:
                            <a href="mailto:{!! $teacher->email !!}">{!! $teacher->email !!}</a>
                        </h5>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 pl-0">
                    {!! $teacher->information !!}
                </div>
            </div>
        </div>
    </section>
@endsection
