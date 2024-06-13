@extends('front.layouts.app')
@section('title')
    {{ __('Академия Гражданской Авиации') }}
@endsection
@section('content')
    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item"
                style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/assets/images/slider/open_academy.png);width: 100%; background-size: cover; background-position: center;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="carousel-content">
                                    <h2>{{ __('Запись на личный прием ректора') }}</h2>
                                    <a class="btn btn-primary btn-lg"
                                        href="https://docs.google.com/forms/u/2/d/e/1FAIpQLSfylFgyYRZ-gFEIKLUumJkWF7gr_g3CRpqtw5ArCr9nkN9wXA/viewform?usp=send_form">Перейти
                                        на
                                        страницу</a><br>
                                    <a class="btn btn-primary btn-lg"
                                        href="https://caa.edu.kz/virtualnaya-priemnaya-komissiya-174"
                                        style="background: #027cad !important;border-color: #027cad !important;">Часто
                                        задаваемые вопросы</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item"
                style=" background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/assets/images/slider/rate.jpg); width:100%; background-size: cover; background-position: center;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="carousel-content">
                                    <h2>Рейтинг ППС</h2>

                                    <a class="btn btn-primary btn-lg" href="https://rate.agakaz.kz/result/list">Рейтинг преподавателей</a><br>
                                    <a class="btn btn-primary btn-lg" href="https://rate.agakaz.kz/result/cafedra">Рейтинг кафедр</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item"
                style=" background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/assets/images/slider/priemn.jpg); width:100%; background-size: cover; background-position: center;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="carousel-content">
                                    <h2>Приемная комиссия</h2>

                                    <a class="btn btn-primary btn-lg" href="/enrollee">Оставить заявку</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item"
                style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/assets/images/slider/virtual_admission_com.jpg);width: 100%; background-size: cover; background-position: center;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="carousel-content">
                                    <h2>{{ __('Виртуальная приемная комиссия') }}</h2>
                                    <a class="btn btn-primary btn-lg"
                                        href="https://caa.edu.kz/virtualnaya-priemnaya-komissiya-244">Перейти на
                                        страницу</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item--><!--
                                                            <div class="item" style=" background:url(/assets/images/slider/Screenshot_7.png); width:100%; background-size: cover; background-position: center;">
                                                                <div class="slider-inner">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 text-center">
                                                                                <div class="carousel-content">
                                                                                <h2></h2><br> <br><h2></h2>
                                                                                    <a class="btn btn-primary btn-lg stretched-link" href="/vakansii">Перейти на страницу</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>--><!--/.item-->
            <div class="item"
                style="background: url(/assets/images/slider/2.jfif);width: 100%; background-size: cover; background-position: center;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="carousel-content">
                                    <h2>Профессиональная подготовка и переподготовка авиационного персонала в соответствии с
                                        требованиями ИКАО</h2><br>
                                    <a class="btn btn-primary btn-lg" href="/centerava">Перейти на страницу</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item"
                style="background: url(/assets/images/slider/psy.png);width: 100%; background-size: cover; background-position: center;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="carousel-content">
                                    <h2></h2><br>
                                    <a class="btn btn-primary btn-lg"
                                        href="https://docs.google.com/forms/d/e/1FAIpQLSdzsqo6x-8rqi_gzQFaY38UqGK3yIaMaFcwHvr8CYR0ls1OPQ/viewform">Заявка
                                        на консультацию <br> психолога</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item"
                style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(/assets/images/slider/last_slide.JPG);width: 100%; background-size: cover; background-position: center;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="carousel-content">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->

    <section id="services" class="services">
        <div class="container">

            <div class="title text-center wow animated zoomInDown">
                <h2>{{ __('Наши') }} <span class="color">{{ __('Сервисы') }}</span></h2>
                <div class="border"></div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-university"></i></div>
                        <h4><a href="https://do.agakaz.kz" class="stretched-link">Platonus</a></h4>
                        <p>{{ __('Автоматизированная информационная система, позволяющая комплексно автоматизировать процессы кредитной системы и дистанционной технологии обучения.') }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-user-plus"></i></div>
                        <h4><a href="/enrollee" class="stretched-link">{{ __('Онлайн регистрация абитуриентов') }}</a></h4>
                        <p>{{ __('Онлайн-регистрация на программы бакалавриата, магистратуры и докторантуры открыта круглый год, что является преимуществом и упрощает подачу заявления.') }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-id-card"></i></div>
                        <h4><a href="/virtualnaya-priemnaya-komissiya-174"
                                class="stretched-link">{{ __('Виртуальная общественная приемная - Open Academy') }}</a></h4>
                        <p>{{ __('В данном разделе обучающиеся, преподаватели и сотрудники Академии могут обратиться и задать интересующие их вопросы, поделиться новыми идеями и предложениями') }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-book"></i></div>
                        <h4><a href="/library" class="stretched-link">{{ __('Библиотека') }}</a></h4>
                        <p>{{ __('Распределенная информационная система, позволяющая надежно сохранять и эффективно использовать разнородные коллекции электронных документов.') }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-credit-card"></i></div>
                        <h4><a href="/bezkomissionnaya-onlayn-oplata-za-obuchenie"
                                class="stretched-link">{{ __('Онлайн оплата') }}</a></h4>
                        <p>{{ __('Безкомиссионная онлайн оплата за обучение. Инструкция для оплаты за обучение.') }}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 wow fadeInUp">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                        <h4><a href="https://moodle.agakaz.kz/" class="stretched-link">Moodle</a></h4>
                        <p>{{ __('Веб-система для организации дистанционного обучения и управления им.') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>{{ __('Новости') }}</h2>
                        @foreach ($news as $item)
                            @php
                                if (Config::get('app.locale') === 'ru') {
                                    $bg_imagess = unserialize($item->bg_images)->ru;
                                } elseif (Config::get('app.locale') === 'kk') {
                                    if (empty(unserialize($item->bg_images)->kk)) {
                                        $bg_imagess = unserialize($item->bg_images)->ru;
                                    } else {
                                        $bg_imagess = unserialize($item->bg_images)->kk;
                                    }
                                } elseif (Config::get('app.locale') === 'en') {
                                    if (empty(unserialize($item->bg_images)->en)) {
                                        $bg_imagess = unserialize($item->bg_images)->ru;
                                    } else {
                                        $bg_imagess = unserialize($item->bg_images)->en;
                                    }
                                }
                            @endphp

                            @if ($loop->first)
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img"
                                        style="background-image: url('https://caa.edu.kz/storage/news/{!! $bg_imagess !!}')">
                                        {{-- <img src="https://caa.edu.kz/storage/news/{!! $bg_imagess !!}" alt=""> --}}
                                        <div class="trend-top-cap">
                                            <h2><a href="{{ route('front.news.show', $item->slug) }}">
                                                    @if (Config::get('app.locale') === 'ru')
                                                        {!! unserialize($item->titles)->ru !!}
                                                    @elseif(Config::get('app.locale') === 'kk')
                                                        {!! unserialize($item->titles)->kk !!}
                                                    @else
                                                        {!! unserialize($item->titles)->en !!}
                                                    @endif
                                                </a></h2>
                                            <small>
                                                <p><i class="far fa-calendar-alt"></i> {!! date('d.m.Y', strtotime($item->publish_at)) !!}</p>
                                            </small>
                                            {{-- <a href="{{ route('front.news.show', $item->slug) }}"
                                                class="btn btn-read">{{ __('Подробнее') }}</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="trending-bottom">
                                    <div class="row">
                                    @else
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30"
                                                    style="background-image: url('/storage/news/{!! $bg_imagess !!}')">
                                                    {{-- <img src="https://caa.edu.kz/storage/news/{!! $bg_imagess !!}" alt=""> --}}
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <h4><a href="{{ route('front.news.show', $item->slug) }}">
                                                            @if (Config::get('app.locale') === 'ru')
                                                                {!! unserialize($item->titles)->ru !!}
                                                            @elseif(Config::get('app.locale') === 'kk')
                                                                {!! unserialize($item->titles)->kk !!}
                                                            @else
                                                                {!! unserialize($item->titles)->en !!}
                                                            @endif
                                                        </a></h4>
                                                    <small>
                                                        <p><i class="far fa-calendar-alt"></i> {!! date('d.m.Y', strtotime($item->publish_at)) !!}</p>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="portfolio_btn text-center fix m-top-100">
                    <a href="/news/" class="btn btn-read">{{ __('Посмотреть все') }}</a>
                </div>
            </div>
            <div class="col-lg-4 caa_events">
                <h2 style="padding: 10px 0px;">{{ __('Объявления') }}</h2>
                @foreach ($events as $event)
                    <div class="col-lg-12 caa_event">
                        <h5>
                            <a href="{{ route('front.events.show', $event->slug) }}">
                                @if (Config::get('app.locale') === 'ru')
                                    {!! unserialize($event->titles)->ru !!}
                                @elseif(Config::get('app.locale') === 'kk')
                                    {!! unserialize($event->titles)->kk !!}
                                @else
                                    {!! unserialize($event->titles)->en !!}
                                @endif
                            </a>
                            <br>
                            <span style="color: #ffffff; text-align:left; font-size: 12px;">
                                {!! date('d.m.Y', strtotime($event->publish_at)) !!}</span>
                        </h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>

    <section id="paraVideo" class="parallax">
        <div class="ParallaxVideo">
            <video autoplay muted loop>
                <source src="/assets/images/Rolik_AVIA без титров.mp4" type="video/mp4">
            </video>
            <h3 class="animated pulse infinite" id="paraVideoText">{{ __('Полет к мечте начинается здесь!') }}</h3>
        </div>
    </section>

    <section id="blocks1">
        <div class="container cardscontainer">
            <div class="page-header title text-center" style="padding-bottom: 25px;">
                <h1>{{ __('Академия гражданской авиации') }}<br></h1>
            </div>
            <div class="row active-with-click">
                {{-- <div id="blocks1_empty">
                </div> --}}

                <div class="col-md-4 col-12">
                    <article class="material-card Light-Blue">
                        <h2>
                            <span>БАКАЛАВРИАТ</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                11 образовательных программ
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container d-none d-sm-block">
                                <img class="img-responsive" src="/assets/images/1block1.jpg">
                            </div>
                            <div class="mc-description">
                                Большое количество государственных образовательных грантов<br>
                                Гранты Ректора<br>
                                Диплом, признаваемый во всем мире<br>
                                Доступная цена за обучение и гибкие условия оплаты
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                <a href="/obrazovatelnye-programmy-na-bakalavriat">{{ __('Подробнее') }}</a>
                            </h4>

                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-12">
                    <article class="material-card Cyan">
                        <h2>
                            <span>МАГИСТРАТУРА</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                5 образовательных программ
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container d-none d-sm-block">
                                <img class="img-responsive" src="/assets/images/1block2.jpg">
                            </div>
                            <div class="mc-description">
                                Инновационные образовательные программы<br>
                                Актуальная тематика диссертаций, имеющая практическое значение<br>
                                Развитая научно-исследовательская база<br>
                                Зарубежная стажировка<br>
                                Гибкие условия оплаты за обучение
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                <a href="/obrazovatelnye-programmy-na-magistraturu-187">{{ __('Подробнее') }}</a>
                            </h4>
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-12">
                    <article class="material-card Teal">
                        <h2>
                            <span>ДОКТОРАНТУРА</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                1 образовательная программа
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container d-none d-sm-block">
                                <img class="img-responsive" src="/assets/images/1block3.jpg">
                            </div>
                            <div class="mc-description">
                                Знания доступные лучшим из лучших<br>
                                Мощная научно-исследовательская инфраструктура<br>
                                Исследовательская деятельность<br>
                                Зарубежная стажировка<br>
                                Адекватная стоимость образовательных услуг, гибкие условия оплаты
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                <a href="/obrazovatelnye-programmy-na-doktoranturu-189">{{ __('Подробнее') }}</a>
                            </h4>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section id="counter" class="parallax-section">
        <div class="container">
            <div class="sec-title text-center mb50 wow rubberBand animated" data-wow-duration="1000ms">
                <h2>{{ __('Академия Гражданской Авиации') }}</h2>
                <h2>в цифрах</h2>
                <div class="devider"><i class="fa fa-plane fa-3x"></i></div>
            </div>
            <div class="row">
                <!-- first count item -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center wow fadeInDown" data-wow-duration="500ms">
                    <div class="counters-item">
                        <div>
                            <span data-speed="3000" data-to="7366">7366</span>
                        </div>
                        <i class="fa fa-graduation-cap fa-3x"></i>
                        <h3>Выпускников</h3>
                        <br>
                    </div>
                </div>
                <!-- end first count item -->

                <!-- second count item -->

                <!-- end second count item -->

                <!-- third count item -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center wow fadeInDown" data-wow-duration="500ms"
                    data-wow-delay="400ms">
                    <div class="counters-item">
                        <div>
                            <span data-speed="3000" data-to="84">84</span>
                            <span>%</span>
                        </div>
                        <i class="fa fa-thumbs-up fa-3x"></i>
                        <h3>Трудоустроенных <br> Выпускников</h3>

                    </div>
                </div>
                <!-- end third count item -->

                <!-- fourth count item -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center wow fadeInDown" data-wow-duration="500ms"
                    data-wow-delay="600ms">
                    <div class="counters-item kill-margin-bottom">
                        <div>
                            <span data-speed="3000" data-to="17">17</span>
                        </div>
                        <i class="fa fa-book fa-3x"></i>
                        <h3>Образовательных <br> программ</h3>
                    </div>
                </div>
                <!-- end fourth count item -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center wow fadeInDown" data-wow-duration="500ms"
                    data-wow-delay="200ms">
                    <div class="counters-item">
                        <div>
                            <span data-speed="3000" data-to="89">89</span>
                        </div>
                        <i class="fa fa-check-square fa-3x"></i>
                        <h3>Преподавателей</h3>
                        <br>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->

    </section>


    <section id="client-logo">
        <div class="container">
            <div class="title text-center wow animated zoomInDown">
                <h2>Наши <span class="color">Партнеры</span></h2>
                <div class="border"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div id="Client_Logo" class="owl-carousel outer">
                            <div class="inner">
                                <a href="https://www.icao.int/Pages/default.aspx" target="_blank"><img
                                        class="img-responsive" src="/assets/images/clientLogo/icao.png"
                                        alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.easa.europa.eu/home" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/easa.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://tsi.lv/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/tsi.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://alicanto.org/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/alicanto.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://uvauga.ru/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/uvauga.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.baatraining.com/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/baaTraining.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://erau.edu/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/erau.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.iata.org/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/iata.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://airastana.com/kaz/ru-RU" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/airAstana.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://naa.edu.az/en/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/naa.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://spbguga.ru/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/spbguga.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="http://www.scat.kz/ru/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/scat.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.f-air.cz/en" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/fair.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.ugatu.su/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/ugatu.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.eskisehir.edu.tr/en" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/eskisehir.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="http://kai.kg/ru" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/kai.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.mstuca.ru/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/mstuca.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://aviacenter.org/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/aviacenter.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="http://www.arz405.kz/" target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/arz.png" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="https://www.patriagroup.com/services/professional-pilot-training/pilot-training-programs"
                                    target="_blank"><img class="img-responsive"
                                        src="/assets/images/clientLogo/patria.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="map">
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5802.496879380682!2d77.00797511018712!3d43.35091361409262!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x388312ab423e0e53%3A0x28f121f26f2a84!2z0JDQutCw0LTQtdC80LjRjyDQk9GA0LDQttC00LDQvdGB0LrQvtC5INCQ0LLQuNCw0YbQuNC4!5e0!3m2!1sru!2skz!4v1656590585883!5m2!1sru!2skz"
                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </section>
@endsection

<script src="//code.jivo.ru/widget/bYmff7N0x8" async></script>
