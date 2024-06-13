<header>
    <div class="container">
        <div class="row">

            <nav id="navMenuLib" class="navbar navbar-expand-lg navbar-bg">

                <div class="sitenavigation float-right">
                    <span class="menu-iconLib">
                        <a href="#" class="menu example5"><span></span></a>
                        <div id="hamburgerLib">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </span>
                    <ul>
                        @foreach ($libtree as $item)
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
                                    <ul class>
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
                                    <a class="text-uppercase" href="{!! $item->link !!}">
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
            </nav>
        </div>
    </div>
</header>
