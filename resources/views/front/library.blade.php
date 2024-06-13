@extends('front.layouts.app')
@section('title')
    {{ __('Академия Гражданской Авиации') }}
@endsection
@section('content')
    <section class="wrapper" id="center"
        style="background-image: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url(/assets/images/library/lib_wallpaper.jpg); background-size: cover;height: 500px;">
        <div class="container">

            {{-- @include('front.inc.header_library') --}}

            <div class="row">
                <div class="col text-center mb-5 text-white">
                    <h1 class="display-4" style="font-weight: bold;margin-top: 100px;">{{ __('Библиотека') }}</h1>
                    <p class="lead">{{ __('Академия гражданской авиации') }}</p>
                </div>
            </div>
            {{-- <section class="services" id="services" style="background: transparent">
                <div class="container" style="margin-bottom: 5vw">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                            <div class="icon-box library"
                                style="background-image: linear-gradient( rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) ), url(/assets/images/lib.jpg)">
                                <h4>
                                    <a class="stretched-link" href="/o-biblioteke">{{ __('О библиотеке') }}</a>
                                </h4>
                                <p></p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                            <div class="icon-box library"
                                style="background-image: linear-gradient( rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) ), url(/assets/images/elib.jpg);">
                                <h4><a class="stretched-link"
                                        href="http://bi.agakaz.kz/">{{ __('Электронная библиотека') }}</a></h4>

                                <p></p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                            <div class="icon-box library"
                                style="background-image: linear-gradient( rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) ), url(/assets/images/for_readers.jpg);">
                                <h4><a class="stretched-link" href="/chitatelyam">{{ __('Читателям') }}</a>
                                </h4>

                                <p></p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                            <div class="icon-box library"
                                style="background-image: linear-gradient( rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) ), url(/assets/images/memo.jpg);">
                                <h4><a class="stretched-link"
                                        href="/pamyatka-dlya-chitateley">{{ __('Памятка для читателей') }}</a></h4>

                                <p></p>
                            </div>
                        </div>

                    </div>
                </div>
            </section> --}}
        </div>
    </section>

    <div class="d-flex align-items-stretch mt-4 wow fadeInUp animated container-fluid" style="background-color: #00249c;">
        <div class="col-12 icon-box virtual_adm row" style="padding: 10px 20px;">
            <div class="col-sm-12 col-md-3 col-lg-2">
                <p align="center"><img alt="" src="\assets\images\library\MinistryOfScience150x150.png"
                        style="width: 85px;"></p>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-10" style="display: grid;align-items: center;">
                <h4 style="text-align: left;">
                    <a class="stretched-link"
                        href="https://caa.edu.kz/ministerstvo-obrazovaniya-i-nauki-respubliki-kazahstan-razrabotalo-elektronnye-portaly-napravlennye-na-rasshirenie-ispolzovaniya-kazahskogo-yazyka-403"
                        style="text-decoration: none;color: white;/* vertical-align: middle; */">{{ __('Министерство науки и высшего образования Республики Казахстан разработало электронные порталы, направленные на расширение использования казахского языка.Подробнее...') }}</a>
                </h4>
            </div>
        </div>
    </div>

    <hr style="background: darkblue;margin: 50px 0 45px 0;" />

    <section id="book_collection">
        <div class="container">
            <div class="row" id="book_collections">
                <div class="col-12 col-md-8" style="background: white">

                    <div class="row" id="book_collections">
                        <div class="title text-center">
                            <h3>{{ __('ПОДПИСНЫЕ БАЗЫ ДАННЫХ') }}</h3>
                            <div class="border"></div>
                        </div>
                        <div class="oneBook col-md-4 col-12 col-sm-6">
                            <a href="http://rmebrk.kz/">
                                <img src="\assets\images\library\riel.png">
                            </a>
                            <h3>
                                РМЭБ
                            </h3>
                            {{ __('Республиканская межвузовская электронная библиотека - информационная и справочно-поисковая библиотечная система') }}
                        </div>

                        <div class="oneBook col-md-4 col-12 col-sm-6">
                            <a href="https://www.iprbookshop.ru/">
                                <img src="\assets\images\library\iprSmart.png">
                            </a>
                            <h3>
                                IPR SMART
                            </h3>
                            {{ __('Содержится литература по различным группам специальностей, что дает возможность учебным заведениям разных профилей найти интересующие их издания') }}
                        </div>

                        <div class="oneBook col-md-4 col-12 col-sm-6">
                            <a href="https://search.ebscohost.com/">
                                <img src="\assets\images\library\EBSCO.png">
                            </a>
                            <h3>
                                EBSCO
                            </h3>
                            {{ __('EBSCO Publishing - крупнейший поставщик научных ресурсов ведущих издательств мира') }}
                        </div>

                        <div class="oneBook col-md-4 col-12 col-sm-6">
                            <a href="https://www.wdl.org/fr">
                                <img src="\assets\images\library\libraryOfCongress.png">
                            </a>
                            <h3>
                                Library of Congress
                            </h3>
                            {{ __('Библиотека Конгресса является крупнейшей библиотекой в мире, в ее фондах хранятся миллионы книг, фильмов и видео, аудиозаписей, фотографий, газет, карт и рукописей. Библиотека является главным исследовательским подразделением Конгресса США и штаб-квартирой Управления авторского права США.') }}
                        </div>

                        <div class="oneBook col-md-4 col-12 col-sm-6">
                            <a href="https://elibrary.icao.int/">
                                <img src="\assets\images\library\libraryICAO.png">
                            </a>
                            <h3>
                                ICAO eLibrary
                            </h3>
                            {{ __('Электронная библиотека ИКАО - это онлайн-хранилище цифровых публикаций Международной организации гражданской авиации (ИКАО), содержащее стандарты и рекомендуемую практику (SARPS) в области международной гражданской авиации, конвенции и связанные с ними акты.') }}
                        </div>

                        <div class="oneBook col-md-4 col-12 col-sm-6">
                            <a href="https://elibrary.icao.int/">
                                <img src="\assets\images\library\Access Engineering.jpeg">
                            </a>
                            <h3>
                                Access Engineering
                            </h3>
                            {{ __('Access Engineering – онлайн-указатель инженерных интерфейсов и обучающая платформа, предлагающая авторитетный, всемирно признанный инженерный контент со встроенными интерактивными инструментами.') }}
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-4 lib-news">
                    <div class="row">
                        <div class="title text-center">
                            <a href="{{ route('front.library_news') }}" style="padding: 0px;">
                                <h3 style="color: white;">{{ __('НОВОСТИ') }}</h3>
                            </a>
                            <div class="border"></div>
                        </div>
                        @foreach ($library_news as $item)
                            <div class="col-lg-12">
                                <h6>
                                    <a href="{{ route('front.library_news.show', $item->slug) }}">
                                        @if (Config::get('app.locale') === 'ru')
                                            {!! unserialize($item->titles)->ru !!}
                                        @elseif(Config::get('app.locale') === 'kk')
                                            {!! unserialize($item->titles)->kk !!}
                                        @else
                                            {!! unserialize($item->titles)->en !!}
                                        @endif
                                    </a>
                                    <span
                                        style="color: white; text-align:left; font-size: 12px;padding: 14px 24px;">{!! date('d.m.Y', strtotime($item->publish_at)) !!}</span>
                                </h6>
                                <hr style="color: white;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    @if (count($newbooks) > 0)
        <section id="newBooks">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>{{ __('Новые поступления') }}</h2>
                        </div>
                        <div id="newBook" class="owl-carousel">
                            @foreach ($newbooks as $item)
                                @php
                                    if (Config::get('app.locale') === 'ru') {
                                        $cover_imgg = unserialize($item->cover_imgs)->ru;
                                    } elseif (Config::get('app.locale') === 'kk') {
                                        if (empty(unserialize($item->cover_imgs)->kk)) {
                                            $cover_imgg = unserialize($item->cover_imgs)->ru;
                                        } else {
                                            $cover_imgg = unserialize($item->cover_imgs)->kk;
                                        }
                                    } elseif (Config::get('app.locale') === 'en') {
                                        if (empty(unserialize($item->cover_imgs)->en)) {
                                            $cover_imgg = unserialize($item->cover_imgs)->ru;
                                        } else {
                                            $cover_imgg = unserialize($item->cover_imgs)->en;
                                        }
                                    }
                                @endphp

                                <div class="row block wow fadeInRight">
                                    <div class="col-5">
                                        <span>
                                            <img alt="" class="img-responsive"
                                                src="/storage/books/newbooks/{!! $cover_imgg !!}">
                                        </span>
                                    </div>
                                    <div class="content col-7">
                                        <h4>
                                            @if (Config::get('app.locale') === 'ru')
                                                {!! Str::limit(unserialize($item->titles)->ru, 40) !!}
                                            @elseif(Config::get('app.locale') === 'kk')
                                                {!! Str::limit(unserialize($item->titles)->kk, 40) !!}
                                            @else
                                                {!! Str::limit(unserialize($item->titles)->en, 40) !!}
                                            @endif
                                        </h4>
                                        <small>
                                            @if (Config::get('app.locale') === 'ru')
                                                {!! Str::limit(unserialize($item->authors)->ru, 40) !!}
                                            @elseif(Config::get('app.locale') === 'kk')
                                                {!! Str::limit(unserialize($item->authors)->kk, 40) !!}
                                            @else
                                                {!! Str::limit(unserialize($item->authors)->en, 40) !!}
                                            @endif
                                        </small>
                                        @if (Config::get('app.locale') === 'ru')
                                            {!! Str::limit(unserialize($item->descriptions)->ru, 100) !!}
                                        @elseif(Config::get('app.locale') === 'kk')
                                            {!! Str::limit(unserialize($item->descriptions)->kk, 100) !!}
                                        @else
                                            {!! Str::limit(unserialize($item->descriptions)->en, 100) !!}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section id="book_collection">
        <div class="container">
            <div class="row" id="book_collections">
                <div class="col-12" style="background: white">
                    <div class="row">
                        <div class="title text-center">
                            <h3>{{ __('ВИДЕОМАТЕРИАЛЫ') }}</h3>
                            <div class="border"></div>
                        </div>
                        <div class="oneMedia col-md-6 col-12">
                            <video controls width="250" poster="/assets/images/library/kabis.png">
                                <source src="/assets/images/library/кабис.mp4" type="video/mp4" />
                                Ваш браузер не поддерживает встроенные видео :(
                            </video>

                            <h3>
                                КАБИС
                            </h3>
                        </div>

                        <div class="oneMedia col-md-6 col-12">

                            <video controls width="250" poster="/assets/images/library/riel.png">
                                <source src="/assets/images/library/РМЭБ.mp4" type="video/mp4" />
                                Ваш браузер не поддерживает встроенные видео :(
                            </video>
                            <h3>
                                РМЭБ
                            </h3>
                        </div>

                        <div class="oneMedia col-md-6 col-12">

                            <video controls width="250" poster="/assets/images/library/iprSmart.png">
                                <source src="/assets/images/library/iprSmart.mp4" type="video/mp4" />
                                Ваш браузер не поддерживает встроенные видео :(
                            </video>
                            <h3>
                                IPR SMART
                            </h3>
                        </div>

                        <div class="oneMedia col-md-6 col-12">

                            <video controls width="250" poster="/assets/images/library/libraryICAO.png">
                                <source src="/assets/images/library/ikaoLibrary.mp4" type="video/mp4" />
                                Ваш браузер не поддерживает встроенные видео :(
                            </video>
                            <h3>
                                IKAO Library
                            </h3>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
