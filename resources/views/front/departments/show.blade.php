@extends('front.layouts.app')
@section('title')
    {{ __('Кафедры') }}
@endsection
@section('content')
    <section id="departments">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">{{ __('Главная') }}</a>
                <span> > </span>
                <a href="{!! route('front.departments.index') !!}">{{ __('Кафедры') }}</a>
                <span> > </span>
                <span>{!! __($department->name) !!}</span>
            </div>
            <div class="departmentBanner">
                {!! __($department->name) !!}
            </div>
            @if (empty($eduP) == false && $department->name !== "Авиационный английский язык" && $department->name !== "Общеобразовательные дисциплины")
                <hr class="col-12" style="height: 5px; background:#00249c; max-width: -webkit-fill-available;" />
                <h2 align="center">{{ __('Образовательные программы') }}</h2><br />
                <div class="d-flex flex-wrap">
                    @foreach ($pages as $page)
                        @php
                            $name = unserialize($page->name);
                        @endphp
                        @if ($page->slug == 'eduProgram1' ||
                            $page->slug == 'eduProgram2' ||
                            $page->slug == 'eduProgram3' ||
                            $page->slug == 'eduProgram4' ||
                            $page->slug == 'eduProgram5' ||
                            $page->slug == 'eduProgram6' ||
                            $page->slug == 'eduProgram7' ||
                            $page->slug == 'eduProgram8' ||
                            $page->slug == 'eduProgram9' ||
                            $page->slug == 'eduProgram10')
                            <div class="col-md-4 col-sm-12 d-flex align-items-stretch mt-4 wow fadeInUp">
                                <div class="icon-box departmentSlug"
                                    style="background-image: linear-gradient( rgba(0, 36, 156, 0.5), rgba(0, 36, 156, 0.5) ), url({!! $page->image !!}); border-radius:5px;">
                                    <h4>
                                        <a class="stretched-link" href="{!! $department->slug !!}/{!! $page->slug !!}">
                                            @if (Config::get('app.locale') === 'ru')
                                                {!! $name['ru'] !!}
                                            @elseif(Config::get('app.locale') === 'kk')
                                                {!! $name['kk'] !!}
                                            @else
                                                {!! $name['en'] !!}
                                            @endif
                                        </a>
                                    </h4>
                                    <p></p>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <!--<div class="col-md-4 col-sm-12 d-flex align-items-stretch mt-4 wow fadeInUp">
                        <div class="icon-box departmentSlug"
                            style="background:#1e3b82, url(/assets/images/department/page/1582705041_2.jpg); border-radius:5px;">
                            <h4>
                                <a class="stretched-link" href="/o-biblioteke">Образовательная программа</a>
                            </h4>
                            <p></p>
                        </div>
                    </div>
                    -->
            @endif

            <hr class="col-12" style="height: 5px; background:#00249c; max-width: -webkit-fill-available;" />

            @foreach ($pages as $page)
                @php
                    $name = unserialize($page->name);
                    $content = unserialize($page->content);
                @endphp
                @if ($page->slug == 'history' || $page->slug == 'science' || $page->slug == 'laboratories')
                    <div class="card" style="margin-bottom: 3px;">
                        <a class="card-link collapsed" data-toggle="collapse" href="#{!! $page->slug . $page->id !!}">
                            <div class="card-header"
                                style="background-color:#00249c; color:white; text-align:center; font-size:1.25rem; font-weight:500;">
                                @if (Config::get('app.locale') === 'ru')
                                    {!! $name['ru'] !!}
                                @elseif(Config::get('app.locale') === 'kk')
                                    {!! $name['kk'] !!}
                                @else
                                    {!! $name['en'] !!}
                                @endif
                            </div>
                        </a>

                        <div class="collapse show" data-parent="#accordion" id="{!! $page->slug . $page->id !!}"
                            style="height: 0px; overflow-x: auto;">
                            <div class="card-body">
                                <p>
                                    @if (Config::get('app.locale') === 'ru')
                                        {!! $content['ru'] !!}
                                    @elseif(Config::get('app.locale') === 'kk')
                                        {!! $content['kk'] !!}
                                    @else
                                        {!! $content['en'] !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <hr class="col-12" style="height: 5px; background:#00249c; max-width: -webkit-fill-available;" />

            @foreach ($pages as $page)
                @php
                    $name = unserialize($page->name);
                @endphp
                @if ($page->slug == 'teachers')
                    <div class="col-12 d-flex align-items-stretch mt-4 wow fadeInUp">
                        <div class="icon-box departmentSlug"
                            style="background:#00249c; border-radius:5px;">
                            <h4>
                                <a class="stretched-link" href="{!! $department->slug !!}/{!! $page->slug !!}">
                                    @if (Config::get('app.locale') === 'ru')
                                        {!! $name['ru'] !!}
                                    @elseif(Config::get('app.locale') === 'kk')
                                        {!! $name['kk'] !!}
                                    @else
                                        {!! $name['en'] !!}
                                    @endif
                                </a>
                            </h4>
                            <p></p>
                        </div>
                    </div>
                @endif
            @endforeach

            <hr class="col-12" style="height: 5px; background:#00249c; max-width: -webkit-fill-available;" />
        </div>
        </div>
    </section>
@endsection
