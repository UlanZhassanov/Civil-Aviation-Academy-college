@extends('front.layouts.app')
@section('title')Академия Гражданской Авиации@endsection
@section('content')
    <section id="news">
        <div class="container">
            <h1>
                @if (Config::get('app.locale') === 'ru')
                    Новости библотеки
                @elseif(Config::get('app.locale') === 'kk')
                    Кітапхана жаңалықтары
                @else
                    Library news
                @endif
            </h1>
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">
                    @if (Config::get('app.locale') === 'ru')
                        Главная
                    @elseif(Config::get('app.locale') === 'kk')
                        Басты бет
                    @else
                        Home
                    @endif
                </a>
                <span> > </span>
                <span>
                    @if (Config::get('app.locale') === 'ru')
                    Новости библотеки
                    @elseif(Config::get('app.locale') === 'kk')
                    Кітапхана жаңалықтары
                    @else
                    Library news
                    @endif
                </span>
            </div>
            <div class="news">
                @foreach ($data as $item)
                    <div class="news__preview">
                        <a href="{{ route('front.library_news.show', $item->slug) }}">
                            <img src="/storage/library_news/@if (Config::get('app.locale') === 'ru'){!! unserialize($item->bg_images)->ru !!}@elseif(Config::get('app.locale') === 'kk')@if(empty(unserialize($item->bg_images)->kk)){!! unserialize($item->bg_images)->ru !!}@else{!! unserialize($item->bg_images)->kk !!}@endif @elseif(Config::get('app.locale') === 'en')@if(empty(unserialize($item->bg_images)->en)){!! unserialize($item->bg_images)->ru !!}@else{!! unserialize($item->bg_images)->en !!}@endif @endif" />
                        </a>
                            <div class="content">
                            <div class="content-title">
                            <h4>
                                <a href="{{ route('front.library_news.show', $item->slug) }}">
                                    @if (Config::get('app.locale') === 'ru')
                                        {!! unserialize($item->titles)->ru !!}
                                    @elseif(Config::get('app.locale') === 'kk')
                                        {!! unserialize($item->titles)->kk !!}
                                    @else
                                        {!! unserialize($item->titles)->en !!}
                                    @endif
                                </a>
                            </h4>
                            </div>
                            {{-- <div class="department">
                                <i class="fas fa-users"></i>
                                <p>{!! $item->department !!}</p>
                            </div> --}}
                            <div class="date-time">
                                <p><i class="far fa-calendar-alt"></i> {!! date('d.m.Y', strtotime($item->publish_at)) !!}</p>
                                <p>&nbsp;&nbsp;<i class="fas fa-clock"></i> {!! date('H:i', strtotime($item->publish_at)) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
