@extends('front.layouts.app')
@section('title')
{{ __('Авиационный колледж') }}@endsection
@section('content')
    <section id="news">
        <div class="container">
            <h1>
                @if (Config::get('app.locale') === 'ru')
                    Новости
                @elseif(Config::get('app.locale') === 'kk')
                    Жаңалықтар
                @else
                    News
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
                        Новости
                    @elseif(Config::get('app.locale') === 'kk')
                        Жаңалықтар
                    @else
                        News
                    @endif
                </span>
            </div>
            <div class="news">
                @foreach ($data as $item)
                    @php
                        $itemTitles = $item->decodeSerialized($item->titles, 'titles');
                        $itemBgImages = $item->decodeSerialized($item->bg_images, 'bg_images');
                    @endphp
                    <div class="news__preview">
                        <a href="{{ route('front.news.show', $item->slug) }}">
                            <img src="/storage/news/@if (Config::get('app.locale') === 'ru'){!! $itemBgImages->ru ?? '' !!}@elseif(Config::get('app.locale') === 'kk')@if(empty($itemBgImages->kk ?? null)){!! $itemBgImages->ru ?? '' !!}@else{!! $itemBgImages->kk !!}@endif @elseif(Config::get('app.locale') === 'en')@if(empty($itemBgImages->en ?? null)){!! $itemBgImages->ru ?? '' !!}@else{!! $itemBgImages->en !!}@endif @endif" />
                        </a>
                            <div class="content">
                            <div class="content-title">
                            <h4>
                                <a href="{{ route('front.news.show', $item->slug) }}">
                                    @if (Config::get('app.locale') === 'ru')
                                        {!! $itemTitles->ru ?? '' !!}
                                    @elseif(Config::get('app.locale') === 'kk')
                                        {!! $itemTitles->kk ?? '' !!}
                                    @else
                                        {!! $itemTitles->en ?? '' !!}
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
            <div style="margin-top: 20px">
                {{ $data->links('admin.pagination.default') }}
            </div>
        </div>
    </section>
@endsection
