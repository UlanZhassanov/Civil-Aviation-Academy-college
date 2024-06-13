@extends('front.layouts.app')
@section('title')
    {{ __('Академия Гражданской Авиации') }}
@endsection
@section('content')
    <section id="pages">
        <div class="container">
            <h1>
                e-Orientation
            </h1>
            <div class="breadcrumbs">
                <a href="http://localcaa.edu.kz:8000">Басты бет</a>
                <span> &gt; </span>
                <a href="http://localcaa.edu.kz:8000/departments">Кафедралар</a>
                <span> &gt; </span>
                <a href="http://localcaa.edu.kz:8000/departments/aviacionnaya-tekhnika-i-tekhnologiya">Авиациялық техника
                    және
                    технология</a>
                <span> &gt; </span>
                <span>
                    e-Orientation
                </span>
            </div>

            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h4 class="text-uppercase text-center mt-5"><span><img src="\assets\images\4ик.png" alt="" style="height: 35px !important"></span> Учебный центр ИКАО по АБ</h4>

                        <hr class="w-50 mx-auto mb-3 border-dark-subtle" />
                    </div>
                </div>
            </div>


            <div class="container overflow-hidden ourteam">
                <div class="row gy-4 gy-lg-4 gx-xxl-5">

                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card h-100 border-0 border-bottom border-primary shadow overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0 row">
                                    <div class="col-lg-3">
                                        <img class="img-fluid" loading="lazy" src="\assets\images\2ик.png" />
                                    </div>

                                    <figcaption class="m-0 p-4 col-lg-9">
                                        <h4 class="mb-1">Аманбаев Шарип</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull; Пилот-инструктор ППП (IFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>50 лет</p>


                                    <div class="card" style="margin-bottom: 3px;">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#ccourse1">
                                            <div class="card-header"
                                                style="background-color:#00249c; color:white; text-align:center; font-size:1.25rem; font-weight:500;">
                                                ydjhtr
                                            </div>
                                        </a>

                                        <div class="collapse show" data-parent="#accordion" id="ccourse1"
                                            style="height: 0px; overflow-x: auto;">
                                            <div class="card-body">
                                                <p>
                                                    gdrgrdg regr thrtdhtrdh trdhrdhrdt ydjhtr
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    </figcaption>

                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="https://caa.edu.kz/assets/images/upload/Әділханов З._1713848193.jpg" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Әділханов Зейнұлла</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull; Технический пилот-инструктор</p>

                                        <h6>Стаж работы:</h6>

                                        <p>12 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Воронцов Константин</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>8 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Дегтярев Дмитрий</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>23 года</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="https://caa.edu.kz/assets/images/upload/Демеш Е._1713848295.jpg" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Демеш Ерасыл</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Старший инструктор теоретической подготовки</p>

                                        <h6>Стаж работы:</h6>

                                        <p>12 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Жаркенов Бейсен</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>9 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Киянов Дмитрий</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Старший пилот-инструктор UPRT</p>

                                        <h6>Стаж работы:</h6>

                                        <p>34 года</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="https://caa.edu.kz/assets/images/upload/Кожахметов Р._1713848339.jpg" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Кожахметов Рустам</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Старший летный инструктор на вертолетах</p>

                                        <h6>Стаж работы:</h6>

                                        <p>33 года</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="https://caa.edu.kz/assets/images/upload/Қабдылхақов Е._1713848360.jpg" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Қабдылхақов Ернұр</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>8 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Қазбек Алдияр</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>12 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Ли Владилен</h4>

                                        <h6>Курсы:</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Подготовка сотрудников по обеспечению полетов/Полетный
                                            диспетчер.</p>

                                        <h6>Стаж работы:</h6>

                                        <p>46 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Луценко Аделина</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>6 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="https://caa.edu.kz/assets/images/upload/Никулин А._1713848384.jpg" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Никулин Анатолий</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>48 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Пастернак Максим</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ППП (IFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>12 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="https://caa.edu.kz/assets/images/upload/Светличный С._1713848397.jpg" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Светличный Сергей</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Инструктор по тренажерной подготовке</p>

                                        <h6>Стаж работы:</h6>

                                        <p>48 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="https://caa.edu.kz/assets/images/upload/Ускенбаев Б._1713848420.jpg" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Ускенбаев Бекзат</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Пилот-инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>9 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0"><img class="img-fluid" loading="lazy"
                                        src="/assets/images/teammember1.png" />
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Шартаев Аскар</h4>

                                        <h6>&nbsp;</h6>

                                        <p>&bull;&nbsp;&nbsp; &nbsp;Старший летный инструктор ПВП (VFR)</p>

                                        <h6>Стаж работы:</h6>

                                        <p>5 лет</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
            </script>

        </div>
    </section>
@endsection
