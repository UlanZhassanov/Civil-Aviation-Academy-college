    <div id="top-bar">
        <div class="container">
            <div class="row">
                <div class="top-bar">
                    <div class="top-bar__left">
                        <div>
                            <i class="fas fa-map-marker-alt"> </i>
							  		 <a href="#footer" id="contacts">
								 		 {{ __('Контакты') }}
							  		 </a>
                        </div>
                        <div>
                            <a href="/virtualnaya-priemnaya-komissiya-174" target="_blank">
                                <i class="far fa-comments"></i> Общественная приемная
                            </a>
                        </div>
                    </div>
                    <div class="top-bar__right">
                        <div class="lang" id="lang">
                            @foreach ($available_locales as $locale_name => $available_locale)
                                @if ($available_locale === $current_locale)
                                    <span>{{ $locale_name }}</span>
                                @else
                                    <a href="/language/{{ $available_locale }}">
                                        {{ $locale_name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
