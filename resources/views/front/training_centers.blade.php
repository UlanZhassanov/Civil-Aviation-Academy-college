@extends('front.layouts.app')
@section('title')
    {{ __('Академия Гражданской Авиации') }}
@endsection
@section('content')
    <section id="pages">
        <div class="container">
            <h1>
                {{ __('Центры') }}
            </h1>
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">{{ __('Главная') }}</a>
                <span> > </span>
                <span>{{ __('Центры') }}</span>
            </div>

            <div class="container centers-banner" style="height: 300px">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <br />

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            </ol>

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active"
                                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.6)), url(/assets/images/123123.png);">

                                </div>

                                {{-- <div class="carousel-item"
                                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.6)), url(/assets/images/sthouse.png);">
                                    <div class="carousel-caption">
                                        <h2>Best Caption Title</h2>
                                        <a href="#" class="btn btn-primary btn-lg">Oh yh it is indeed!!!!!! :D</a>
                                    </div>
                                </div>

                                <div class="carousel-item"
                                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.6)), url(/assets/images/123123.png);">
                                </div> --}}
                            </div>

                            <a class="left carousel-control" href="#carousel-example-generic" role="button"
                                data-slide="prev">
                                <span class="icon-prev" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="right carousel-control" href="#carousel-example-generic" role="button"
                                data-slide="next">
                                <span class="icon-next" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="confBanner">ЦЕНТРЫ</div> --}}

            <div class="container py-5">
                <div class="p-5 bg-white rounded shadow mb-5">
                    <!-- Rounded tabs -->
                    <ul id="myTab" role="tablist"
                        class="nav nav-tabs nav-pills flex-column flex-sm-row text-center border-0 rounded-nav">
                        <li class="nav-item flex-sm-fill">
                            <img class="center-icon" src="\assets\images\1ик.png" style="width: 100px; margin: 10px;">
                            <a id="home-tab" data-toggle="tab" href="#center1" role="tab" aria-controls="home"
                                aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">
                                EASA PART FCL
                            </a>
                        </li>
                        <li class="nav-item flex-sm-fill">
                            <img class="center-icon" src="\assets\images\2ик.png" style="width: 100px; margin: 10px;">
                            <a id="profile-tab" data-toggle="tab" href="#center2" role="tab" aria-controls="profile"
                                aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">ЦПиТАП</a>
                        </li>
                        <li class="nav-item flex-sm-fill">
                            <img class="center-icon" src="\assets\images\3ик.png" style="width: 100px; margin: 10px;">
                            <a id="contact-tab" data-toggle="tab" href="#center3" role="tab" aria-controls="contact"
                                aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">АЦ IATA</a>
                        </li>
                        <li class="nav-item flex-sm-fill">
                            <img class="center-icon" src="\assets\images\4ик.png" style="width: 100px; margin: 10px;">
                            <a id="contact-tab" data-toggle="tab" href="#center4" role="tab" aria-controls="contact"
                                aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">УЦАБ
                                ИКАО</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div id="center1" role="tabpanel" aria-labelledby="home-tab"
                            class="tab-pane fade px-4 py-5 show active">
                            <p class="">Мы находимся на пути к тому, чтобы стать, ключевой частью будущей авиации,
                                используя развивающуюся технологию и прогрессивную учебную программу, чтобы дать
                                курсантам возможность выйти за рамки обычного и стать пилотами мирового класса.
                                Наше видение заключается в том, чтобы стать ведущим мировым центром подготовки для
                                всех начинающих пилотов с талантом и амбициями в соответствии EASA стандартами.</p>
                        </div>
                        <div id="center2" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                            <p>Центр подготовки авиационного персонала (ЦПАП) образован в марте 2022 года. Наш
                                центр имеет широкий спектр курсов теоретической и практической подготовки.
                                Квалифицированные инструкторы, а также приглашенные специалисты с удовольствием
                                поделятся со своим опытом в сфере гражданской авиации. С 1 марта 2024 года Центр
                                тестирования и ОВД был объединен с ЦПАП, теперь он называется - Центр подготовки и
                                тестирования авиационного персонала (ЦПиТАП). На данный момент наш центр так же
                                проводит обучения и тестирования по EALTS, ATPL, PART 147.</p>
                        </div>
                        <div id="center3" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                            <p>Академия гражданской авиации прошла аккредитацию учебного центра IATA и
                                авторизована на проведение учебных курсов IATA в 2021 году. Опираясь на опыт
                                мировых практиков, включая экспертов IATA и организаций-членов, IATA разрабатывает
                                и поддерживает обширные программы обучения и повышения квалификации, а также
                                курсов, ведущих к получению международных признанных сертификатов и дипломов.
                                Сертификаты IATA гарантируют, что получатель прошел обучение на высоком уровне.
                                Они получили всемирное признание и признание в мировой авиационной индустрии как
                                качественный продукт. Это важная квалификация для всех, кто хочет повысить свою
                                профессиональную компетентность или начать карьеру в авиатранспортной отрасли.</p>
                        </div>
                        <div id="center4" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                            <p>Учебный центр ИКАО по авиационной безопасности (ASTC – Almaty) был образован в
                                2013 году на базе Академии гражданской авиации. Наш центр ведет свою деятельность в
                                тесном сотрудничестве с Подразделением по развитию и поддержки внедрения (ISD –
                                SEC) Авиатранспортного управление (ATB) Международной организации гражданской
                                авиации (ИКАО). Наш центр является одним из 36 региональных учебных центров по
                                авиационной безопасности ИКАО в мире. Основной задачей УЦАБ ИКАО является
                                предоставление стандартизированной подготовки по авиационной безопасности в
                                центральноазиатском регионе.</p>
                        </div>
                    </div>
                    <!-- End rounded tabs -->


                </div>


                <div class="row">
                    <div class="col text-center">
                        <br>
                        <p class=""><a
                                href="/assets/images/upload/Руководство по системе управления НОВОЕ.pdf">{{ __('Руководство по системе управления') }}</a>
                        </p><br>
                        <p class=""><a
                                href="/assets/images/upload/Политика в области обеспечения безопасности полетов.pdf">{{ __('Политика в области обеспечения безопасности полетов') }}</a>
                        </p><br>
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>

        </div>
    </section>
@endsection

@section('fancybox')
    @include('front.fancybox')
@endsection
