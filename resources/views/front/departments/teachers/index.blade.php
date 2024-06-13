@extends('front.layouts.app')
@section('title')
    {{ __('Кафедры') }}
@endsection
@section('content')
    <section id="departments">
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
                <span>{{ __('Профессорско-преподавательский состав') }}</span>
            </div>
            <div class="d-flex flex-wrap">
                @foreach ($teachers as $teacher)
                    <div class="col-md-3 col-sm-12 pl-0">
                        <img src="{!! $teacher->photo !!}" class="w-100" alt="">
                        <div class="title">
                            <h4 class="pt-2 text-center">
                                <a href="{!! route('front.department.teachers.show', ['department' => $department->slug, 'teacher' => $teacher->slug]) !!}">
                                    {!! $teacher->surname !!}
                                    {!! $teacher->name !!}
                                    @if (isset($teacher->patronymic))
                                        {!! $teacher->patronymic !!}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
