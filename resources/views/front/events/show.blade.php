@extends('front.layouts.app')
@section('title')
    Академия Гражданской Авиации
@endsection
@section('content')
    <section id="news">
        <div class="container">
            <h1>
                @if (Config::get('app.locale') === 'ru')
                    {!! unserialize($event->titles)->ru !!}
                @elseif(Config::get('app.locale') === 'kk')
                    {!! unserialize($event->titles)->kk !!}
                @else
                    {!! unserialize($event->titles)->en !!}
                @endif
            </h1>
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">
                    @if (Config::get('app.locale') === 'ru')
                        Главная
                    @elseif(Config::get('app.locale') === 'kk')
                        Уйге
                    @else
                        Home
                    @endif
                </a>
                <span> > </span>
                <a href="{!! route('front.events') !!}">
                    @if (Config::get('app.locale') === 'ru')
                        События
                    @elseif(Config::get('app.locale') === 'kk')
                        Оқиғалар
                    @else
                        Events
                    @endif
                </a>
                <span> > </span>
                <span>
                    @if (Config::get('app.locale') === 'ru')
                        {!! unserialize($event->titles)->ru !!}
                    @elseif(Config::get('app.locale') === 'kk')
                        {!! unserialize($event->titles)->kk !!}
                    @else
                        {!! unserialize($event->titles)->en !!}
                    @endif
                </span>
            </div>
            <div class="detail-news">
                @if (Config::get('app.locale') === 'ru')
                    {!! unserialize($event->descriptions)->ru !!}
                @elseif(Config::get('app.locale') === 'kk')
                    {!! unserialize($event->descriptions)->kk !!}
                @else
                    {!! unserialize($event->descriptions)->en !!}
                @endif
            </div>
        </div>
    </section>
@endsection
@section('fancybox')
    @include('front.fancybox')
@endsection
