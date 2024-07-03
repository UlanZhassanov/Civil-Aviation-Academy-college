@extends('front.layouts.app')
@section('title')
{{ __('Авиационный колледж') }}@endsection
@section('content')
    <section id="news">
        <div class="container">
            <h1>
                @if (Config::get('app.locale') === 'ru')
                Мероприятия в рамках профилактики противодействия коррупции
                @elseif(Config::get('app.locale') === 'kk')
                Сыбайлас жемқорлыққа қарсы іс-қимылдың алдын алу шеңберіндегі іс-шаралар
                @else
                Мероприятия в рамках профилактики противодействия коррупции
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
                <a href="https://caa.edu.kz/antikorrupcionnaya-deyatelnost">
                    @if (Config::get('app.locale') === 'ru')
                    Антикоррупционная деятельность
                    @elseif(Config::get('app.locale') === 'kk')
                    Сыбайлас жемқорлыққа қарсы қызмет
                    @else
                    Антикоррупционная деятельность
                    @endif
                </a>
                <span> > </span>
                <span>
                    @if (Config::get('app.locale') === 'ru')
                    Мероприятия
                    @elseif(Config::get('app.locale') === 'kk')
                    Іс-шаралар
                    @else
                    Мероприятия
                    @endif
                </span>
            </div>
            <div class="news">
                @foreach ($data as $item)
                    <div class="news__preview">
                        <a href="{{ route('front.newsCompliance.show', $item->slug) }}">
                            <img src="/storage/news/@if (Config::get('app.locale') === 'ru'){!! unserialize($item->bg_images)->ru !!}@elseif(Config::get('app.locale') === 'kk')@if(empty(unserialize($item->bg_images)->kk)){!! unserialize($item->bg_images)->ru !!}@else{!! unserialize($item->bg_images)->kk !!}@endif @elseif(Config::get('app.locale') === 'en')@if(empty(unserialize($item->bg_images)->en)){!! unserialize($item->bg_images)->ru !!}@else{!! unserialize($item->bg_images)->en !!}@endif @endif" />
                        </a>
                            <div class="content">
                            <div class="content-title">
                            <h4>
                                <a href="{{ route('front.newsCompliance.show', $item->slug) }}">
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
