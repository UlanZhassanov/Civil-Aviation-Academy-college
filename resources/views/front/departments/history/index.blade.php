@extends('front.layouts.app')
@section('title')
    @if (Config::get('app.locale') === 'ru')
        {!! $name['ru'] !!}
    @elseif(Config::get('app.locale') === 'kk')
        {!! $name['kk'] !!}
    @else
        {!! $name['en'] !!}
    @endif
@endsection
@section('content')
    <section id="departments">
        <div class="container">
            <h1>
                @if (Config::get('app.locale') === 'ru')
                    {!! $name['ru'] !!}
                @elseif(Config::get('app.locale') === 'kk')
                    {!! $name['kk'] !!}
                @else
                    {!! $name['en'] !!}
                @endif
            </h1>
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">{{ __('Главная') }}</a>
                <span> > </span>
                <a href="{!! route('front.departments.index') !!}">{{ __('Кафедры') }}</a>
                <span> > </span>
                <a href="{!! route('front.departments.show', $department->slug) !!}">{!! __($department->name) !!}</a>
                <span> > </span>
                <span>
                    @if (Config::get('app.locale') === 'ru')
                        {!! $name['ru'] !!}
                    @elseif(Config::get('app.locale') === 'kk')
                        {!! $name['kk'] !!}
                    @else
                        {!! $name['en'] !!}
                    @endif
                </span>
            </div>
            @if (Config::get('app.locale') === 'ru')
                {!! $content['ru'] !!}
            @elseif(Config::get('app.locale') === 'kk')
                {!! $content['kk'] !!}
            @else
                {!! $content['en'] !!}
            @endif
        </div>
    </section>
@endsection
