@extends('front.layouts.app')
@section('title')
    {{ __('Академия Гражданской Авиации') }}
@endsection
@section('content')
<section class="wrapper" id="center">
  <div class="container">
      <div class="breadcrumbs">
          <a href="{!! route('front.home') !!}">{{ __('Главная') }}</a>
          <span> > </span>
          <span>{{ __('Учебные центры') }}</span>
      </div>
    <div class="row">
      <div class="col text-center mb-5">
        <h1 class="text-uppercase">{{ __('Учебные центры') }}</h1>
        <p class="lead">{{ __('Академия гражданской авиации осуществляет профессиональную подготовку, переподготовку авиационных специалистов в соответствии с требованиями Типовых программ профессиональной подготовки авиационного персонала, а также правилами ИКАО.') }}</p>
      </div>
    </div>
    <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-white card-has-bg click-col" style="background-image:url('/assets/images/pages/71119_5e82deef9.jpg');">
            <img class="card-img d-none" src="/assets/images/pages/71119_5e82deef9.jpg" alt="Лётно-тренажерный центр">
            <div class="card-img-overlay d-flex flex-column">
              <div class="card-body">
                <small class="card-meta mb-2">---------------------</small>
                <h3 class="card-title mt-0 "><a class="text-white stretched-link" href="/trenazhernyy-kompleks">{{ __('Лётно-тренажерный центр') }}</a></h3>
              </div>
            </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-white card-has-bg click-col" style="background-image:url('/assets/images/80cad5bd-adaf-4ab5-a982-327d1cb560ad.jpg');">
          <img class="card-img d-none" src="/assets/images/80cad5bd-adaf-4ab5-a982-327d1cb560ad.jpg" alt="Центр развития авиационной отрасли ИАТА">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <small class="card-meta mb-2">---------------------</small>
              <h3 class="card-title mt-0 "><a class="text-white stretched-link" href="/centr-iata">{{ __('Учебный центр IATA') }}</a></h3>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-white card-has-bg click-col" style="background-image:url('/assets/images/9a1a775e-9e83-477f-90e8-7ce9916d8d8a.jpg');">
          <img class="card-img d-none" src="/assets/images/9a1a775e-9e83-477f-90e8-7ce9916d8d8a.jpg" alt="Учебный центр ИКАО по авиационной безопасности">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <small class="card-meta mb-2">---------------------</small>
              <h3 class="card-title mt-0 "><a class="text-white stretched-link" href="/uchebnyy-centr-po-aviacionnoy-bezopasnosti-ikao">{{ __('Учебный центр по авиационной безопасности ICAO') }}</a></h3>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-white card-has-bg click-col" style="background-image:url('/assets/images/b96e257f-8e4d-4247-a58a-8e238344098c.jpg');">
          <img class="card-img d-none" src="/assets/images/b96e257f-8e4d-4247-a58a-8e238344098c.jpg" alt="Центр подготовки специалистов по ТО ВС и аэродромного обслуживания">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <small class="card-meta mb-2">---------------------</small>
              <h3 class="card-title mt-0 "><a class="text-white stretched-link" href="/centr-podgotovki-specialistov-po-to-vs-i-aerodromnogo-obsluzhivaniya-183">{{ __('Центр подготовки авиационного персонала') }}</a></h3>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-white card-has-bg click-col" style="background-image:url('/assets/images/f9ca47be-aabd-46a7-bf74-a49f8ce861a9.jpg');">
          <img class="card-img d-none" src="/assets/images/f9ca47be-aabd-46a7-bf74-a49f8ce861a9.jpg" alt="Центр подготовки специалистов обслуживания воздушного движения и тестирования авиационного персонала">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <small class="card-meta mb-2">---------------------</small>
              <h3 class="card-title mt-0 "><a class="text-white stretched-link" href="centr-podgotovki-specialistov-po-ovd-i-testirovaniya-aviacionnogo-personala-182">{{ __('Центр тестирования и ОВД') }}</a></h3>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-white card-has-bg click-col" style="background-image:url('/assets/images/123_1657533883.jpg');">
          <img class="card-img d-none" src="/assets/images/123_1657533883.jpg" alt="Авиационно-технический центр">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <small class="card-meta mb-2">---------------------</small>
              <h3 class="card-title mt-0 "><a class="text-white stretched-link" href="/aviacionno-tehnicheskiy-centr-240">{{ __('Авиационно-технический центр') }}</a></h3>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col text-center mb-5">
      <br>
      <p class="lead"><a href="/upravlenie-bezopasnostyu-poletov">{{ __('Управление безопасностью полётов') }}</a></p><br>
      <p class="lead"><a href="/assets/images/upload/Декларация Руководителя РУБП_1677233267.pdf">{{ __('Руководство по управлению безопасностью полетов') }}</a></p><br>
        <h2>{{ __('НАШИ СЕРТИФИКАТЫ') }}</h2>
        <p class="lead"><a href="/assets/images/Сертификат АУК рус.pdf">{{ __('Область действия сертификата авиационного учебного центра') }}</a></p>
        <p class="lead"><a href="/assets/images/Сертификат тренажера ALSIM АУК АГА от 20.02.2023_.pdf">{{ __('Сертификат соответствия тренажера ALSIM (ALX-85) FNPT II / MCC') }}</a></p>
        <p class="lead"><a href="/assets/images/Сертификат Boeing do 2024.pdf">{{ __('Сертификат соответствия тренажера FNPT Level II / MCC+FTD1 (B737NG)') }}</a></p>
        <p class="lead"><a href="/assets/images/Сертификат А320 от 08.09.2023.pdf">{{ __('Сертификат соответствия тренажера FNPT II / MCC+FTD1 (A320-200)') }}</a></p>
      </div>
    </div>
  </div>
</section>

<section id="paraVideo" class="parallax">
<div class="ParallaxVideo">
    <video autoplay muted loop>
        <source src="/assets/images/pages/AGA.mp4" type="video/mp4">
    </video>
</div>
</section>
@endsection
