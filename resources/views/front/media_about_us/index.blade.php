@extends('front.layouts.app')
@section('title')
    Академия Гражданской Авиации
@endsection
@section('content')
    <section id="news">
        <div class="container">
            <h1>
                @if (Config::get('app.locale') === 'ru')
                    СМИ о нас
                @elseif(Config::get('app.locale') === 'kk')
                    Біз туралы БАҚ
                @else
                    Media about us
                @endif
            </h1>
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">
                    @if (Config::get('app.locale') === 'ru')
                        Главная
                    @elseif(Config::get('app.locale') === 'kk')
                        Үйге
                    @else
                        Home
                    @endif
                </a>
                <span> > </span>
                <span>
                    @if (Config::get('app.locale') === 'ru')
                        СМИ о нас
                    @elseif(Config::get('app.locale') === 'kk')
                        Біз туралы БАҚ
                    @else
                        Media about us
                    @endif
                </span>
            </div>
            <br>

            @if (Config::get('app.locale') === 'ru')
                <p>Уважаемые представители СМИ!<br />
                    Академия гражданской авиации открыта к сотрудничеству и готова предоставить интересующую информацию о
                    работе Академии. <br />
                    По вопросам сотрудничества, записи интервью и предоставления материалов, пожалуйста, обращайтесь по
                    телефону +7 727 346 92 06 вн.227, <br />
                    email: pr@agakaz.kz<br />
                    <br />
                    БУДЕМ РАДЫ РАБОТАТЬ ВМЕСТЕ!
                </p>
            @elseif(Config::get('app.locale') === 'kk')
                <p>Құрметті БАҚ өкілдері!<br />
                    Азаматтық авиация академиясы ынтымақтастыққа ашық және Академияның жұмысы туралы қызықты ақпарат беруге
                    дайынбіз. Сұхбаттарды, материалдар алу және ынтымақтастық мәселелері бойынша <br />
                    +7 727 346 92 06 (ішкі 227) нөмірі немесе pr@agakaz.kz email арқылы хабарласуыңызды сұраймыз.<br />
                    <br />
                    БІРГЕ ЖҰМЫС ІСТЕУГЕ ҚУАНЫШТЫМЫЗ!
                </p>
            @else
                <p>Dear media representatives!<br />
                    The Civil Aviation Academy is open to cooperation. We are always glad to provide information about the
                    Academy.
                    If you have any questions, please do not hasitate co contact us by phone <br />
                    +7 727 346 92 06 ext.227 or email us pr@agakaz.kz <br />
                    <br />
                    OUR PLEASURE TO WORK WITH YOU!
                </p>
            @endif
            <br />
            <br />

            <div class="news row">
                @foreach ($data as $item)
                    <div class="col-12" style="border-bottom: 2px solid darkblue;background: #f5f5fd; margin-bottom: 25px;">
                        <div style="font-size: 15px;padding: 15px 10px;">
                            <p>
                                <span class="h5">
                                    <b>
                                        <a href="{{ $item->link }}">
                                            <img src="/storage/mediaAboutUs/{!! $item->bg_image !!}" style="max-width: 200px;max-height: 90px;width: auto;" alt="{{ $item->media_en }}">
                                            {{-- <a href="{{ $item->link }}">
                                            @if (Config::get('app.locale') === 'ru')
                                                {{ $item->media_en }}
                                            @elseif(Config::get('app.locale') === 'kk')
                                                {{ $item->media_en }}
                                            @else
                                                {{ $item->media_en }}
                                            @endif
                                         --}}
                                        </a>
                                </span> -
                                @if (Config::get('app.locale') === 'ru')
                                    {{ $item->title_ru }}
                                @elseif(Config::get('app.locale') === 'kk')
                                    {{ $item->title_kk }}
                                @else
                                    {{ $item->title_en }}
                                @endif
                            </p>
                            <a href="{{ $item->link }}">
                                @if (Config::get('app.locale') === 'ru')
                                    Подробнее...
                                @elseif(Config::get('app.locale') === 'kk')
                                    Толығырақ...
                                @else
                                    Read more...
                                @endif
                            </a>
                            </b>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
