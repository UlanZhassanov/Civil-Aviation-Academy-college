@extends('front.layouts.app')
@section('title')Академия Гражданской Авиации@endsection
@section('content')
    <section id="events">
        <div class="container">
            <h1>
                @if (Config::get('app.locale') === 'ru')
                    События
                @elseif(Config::get('app.locale') === 'kk')
                    Оқиғалар
                @else
                    Events
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
                <span>
                    @if (Config::get('app.locale') === 'ru')
                        События
                    @elseif(Config::get('app.locale') === 'kk')
                        Оқиғалар
                    @else
                        Events
                    @endif
                </span>
            </div>
            <div class="events">
                @foreach ($events as $event)
                    <div class="event">
                        <div class="event__date-info">
                            <p><i class="far fa-calendar-alt"></i> {!! date('d.m.Y', strtotime($event->publish_at)) !!}</p>
                            <p><i class="fas fa-clock"></i> {!! date('H:i', strtotime($event->publish_at)) !!}</p>
                        </div>
                        <div class="event__preview">
                            <h4>
                                <a href="{{ route('front.events.show', $event->slug) }}">
                                    @if (Config::get('app.locale') === 'ru')
                                        {!! Str::limit(unserialize($event->titles)->ru, 38) !!}
                                    @elseif(Config::get('app.locale') === 'kk')
                                        {!! Str::limit(unserialize($event->titles)->kk, 35) !!}
                                    @else
                                        {!! Str::limit(unserialize($event->titles)->en, 38) !!}
                                    @endif
                                </a>
                            </h4>
                            <p class="content__desc">
                                @if (Config::get('app.locale') === 'ru')
                                    {!! Str::limit(strip_tags(unserialize($event->descriptions)->ru), 160) !!}
                                @elseif(Config::get('app.locale') === 'kk')
                                    {!! Str::limit(strip_tags(unserialize($event->descriptions)->kk), 160) !!}
                                @else
                                    {!! Str::limit(strip_tags(unserialize($event->descriptions)->en), 160) !!}
                                @endif
                            </p>
                            <div class="department">
                                <i class="fas fa-users"></i>
                                <p>{!! $event->department !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
