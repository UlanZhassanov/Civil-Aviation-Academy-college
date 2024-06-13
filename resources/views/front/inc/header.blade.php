<header>
    <div class="container">
        <div class="row">

            <nav id="navMenu" class="navbar navbar-expand-lg navbar-bg fixed-top">
                <div id="my_image" class="logo2">
                    <a href="/">
                        <img src="/assets/images/logo_agakaz_b.png" />
                    </a>
                </div>
                <div>
                    {{-- <div class="lang_choose float-left">
                        <a href="/virtualnaya-priemnaya-komissiya-174" target="_blank">
                            <i class="far fa-comments"></i> Общественная приемная
                        </a>
                    </div> --}}
                <div class="lang_choose float-left">
                    <select onchange="location = this.value;">
                        @foreach ($available_locales as $locale_name => $available_locale)
                        @if ($available_locale === $current_locale)
                        <option selected>{{ $locale_name }}</option>
                        @else
                        <option value="/language/{{ $available_locale }}">
                                {{ $locale_name }}
                            </option>
                        @endif
                    @endforeach
                    </select>
                </div>

                <div class="sitenavigation float-right">
                    <span class="menu-icon">
                        <a href="#" class="menu example5"><span></span></a>
                        <div id="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </span>
                    <ul>
                        @foreach ($tree as $item)
                            @if ($item->children->count() > 0)
                                <li class="nav-dropdown">
                                    <a class="text-uppercase" href="{!! $item->link !!}">
                                        @if (Config::get('app.locale') == 'ru')
                                            {!! $item->title_ru !!}
                                        @elseif ( Config::get('app.locale') == 'kk' )
                                            {!! $item->title_kk !!}
                                        @elseif ( Config::get('app.locale') == 'en' )
                                            {!! $item->title_en !!}
                                        @endif
                                    </a>
                                    <ul>
                                        <li hidden><a href="#">__</a></li>
                                        @foreach ($item->children as $child)
                                            @if ($child->children->count() > 0)
                                                <li class="nav-dropdown">
                                                    @if (Request::root() . '/' . $child->link === Request::fullUrl())
                                                        <a href="{!! route('front.pages', $child->link) !!}" class="active">
                                                            @if (Config::get('app.locale') == 'ru')
                                                                {!! $child->title_ru !!}
                                                            @elseif ( Config::get('app.locale') == 'kk' )
                                                                {!! $child->title_kk !!}
                                                            @elseif ( Config::get('app.locale') == 'en' )
                                                                {!! $child->title_en !!}
                                                            @endif
                                                        </a>
                                                    @else
                                                        <a href="{!! route('front.pages', $child->link) !!}">
                                                            @if (Config::get('app.locale') == 'ru')
                                                                {!! $child->title_ru !!}
                                                            @elseif ( Config::get('app.locale') == 'kk' )
                                                                {!! $child->title_kk !!}
                                                            @elseif ( Config::get('app.locale') == 'en' )
                                                                {!! $child->title_en !!}
                                                            @endif
                                                        </a>
                                                    @endif
                                                    <ul>
                                                        <li hidden><a href="#">__</a></li>
                                                        @foreach ($child->children as $chi)
                                                            @if ($chi->children->count() > 0)
                                                                <li class="nav-dropdown">
                                                                    <a href="{!! $chi->link !!}">
                                                                        @if (Config::get('app.locale') == 'ru')
                                                                            {!! $chi->title_ru !!}
                                                                        @elseif ( Config::get('app.locale') == 'kk'
                                                                            )
                                                                            {!! $chi->title_kk !!}
                                                                        @elseif ( Config::get('app.locale') == 'en'
                                                                            )
                                                                            {!! $chi->title_en !!}
                                                                        @endif
                                                                    </a>
                                                                    <ul>
                                                                        @foreach ($chi->children as $ch)
                                                                            <li>
                                                                                <a href="{!! $ch->link !!}">
                                                                                    @if (Config::get('app.locale') == 'ru')
                                                                                        {!! $ch->title_ru !!}
                                                                                    @elseif (
                                                                                        Config::get('app.locale') == 'kk' )
                                                                                        {!! $ch->title_kk !!}
                                                                                    @elseif (
                                                                                        Config::get('app.locale') == 'en' )
                                                                                        {!! $ch->title_en !!}
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a href="{!! $chi->link !!}">
                                                                        @if (Config::get('app.locale') == 'ru')
                                                                            {!! $chi->title_ru !!}
                                                                        @elseif ( Config::get('app.locale') == 'kk'
                                                                            )
                                                                            {!! $chi->title_kk !!}
                                                                        @elseif ( Config::get('app.locale') == 'en'
                                                                            )
                                                                            {!! $chi->title_en !!}
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li>
                                                    @if ($child->link == 'https://vestnik.agakaz.kz/')
                                                        @if (Config::get('app.locale') == 'ru')
                                                            <a href="https://vestnik.agakaz.kz/">
                                                                {!! $child->title_ru !!}
                                                            </a>
                                                        @endif
                                                        @if (Config::get('app.locale') == 'kk')
                                                            <a href="https://vestnik.agakaz.kz/kk">
                                                                {!! $child->title_kk !!}
                                                            </a>
                                                        @endif
                                                        @if (Config::get('app.locale') == 'en')
                                                            <a href="https://vestnik.agakaz.kz/en">
                                                                {!! $child->title_en !!}
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="{!! $child->link !!}">
                                                            @if (Config::get('app.locale') == 'ru')
                                                                {!! $child->title_ru !!}
                                                            @elseif ( Config::get('app.locale') == 'kk' )
                                                                {!! $child->title_kk !!}
                                                            @elseif ( Config::get('app.locale') == 'en' )
                                                                {!! $child->title_en !!}
                                                            @endif
                                                        </a>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a class="text-uppercase" href="/{!! $item->link !!}">
                                        @if (Config::get('app.locale') == 'ru')
                                            {!! $item->title_ru !!}
                                        @elseif ( Config::get('app.locale') == 'kk' )
                                            {!! $item->title_kk !!}
                                        @elseif ( Config::get('app.locale') == 'en' )
                                            {!! $item->title_en !!}
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            </nav>
        </div>
    </div>
</header>
