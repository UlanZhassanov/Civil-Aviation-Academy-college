    <footer id="footer">
        <div class="container">
            <div class="footer">
                <div class="footer__info">
                    <div class="info-block wow fadeInDown">
                        <h4>{{ __('Контакты') }}</h4>
                        <p> {{ __('Приемная комиссия Академии:') }}<br />
                            <a href="tel:87273469208"><i class="fa fa-phone-alt"></i> +7 (727) 346-92-08 (вн. 245)</a>
                            <a href="tel:87073169281"><i class="fa fa-phone-alt"></i> +7 (707) 316-92-81</a>
                            <a href="mailto:admissions@agakaz.kz"><i class="fa fa-envelope"></i> admissions@agakaz.kz</a><br />
                            {{-- {{ __('Канцелярия:') }}<br />
                            <a href="tel:87273469206">+7 (727) 346-92-06 (вн. 215)</a><br /> --}}
                            {{-- {{ __('Лётно-тренажёрный центр') }}:<br />
                            <a href="tel:87273469206">+7 (727) 346-92-06 (вн. 206)</a><br/>
                            {{ __('Военная кафедра') }}:<br />
                            <a href="tel:87273469206">+7 (727) 346-92-06 (вн. 256)</a><br/> --}}
                            {{ __('Центр обслуживания студентов:') }}<br />
                            <a href="tel:87273399929"><i class="fa fa-phone-alt"></i> +7 (727) 339-99-29</a>
                            <a href="mailto:sscenter@agakaz.kz"><i class="fa fa-envelope"></i> sscenter@agakaz.kz</a><br />
                            {{ __('Колл-центр Академии:') }}<br />
                            <a href="tel:87020244512"><i class="fa fa-phone-alt"></i> +7 (702) 024-45-12</a>
                            <a href="mailto:info@agakaz.kz"><i class="fa fa-envelope"></i> info@agakaz.kz</a><br />
                            {{ __('Колл-центр Колледжа:') }}<br />
                            <a href="tel:87273469206"><i class="fa fa-phone-alt"></i> +7 (727) 346-92-06 (вн. 253)</a>
                            <a href="tel:87478198730"><i class="fa fa-phone-alt"></i> +7 (747) 819-87-30 (whatsapp)</a><br />


                            {{ __('Канцелярия') }}<br />
                            <a href="tel:+77273469206"><i class="fa fa-phone-alt"></i> +7 (727) 346-92-06 (вн. 215)</a>
                            <a href="mailto:office@agakaz.kz"><i class="fa fa-envelope"></i> office@agakaz.kz</a><br />

                            {{ __('ул. Закарпатская, 44') }}
                            {{ __('050039, Алматы') }} <br />
                            {{ __('Республика Казахстан') }}
                        </p>
                    </div>
                    <div class="info-block wow fadeInUp">
                        <h4>{{ __('Об Академии') }}</h4>
                        <a href="/rukovodstvo">{{ __('Руководство') }}</a>
                        <a href="/korporativnoe-upravlenie">{{ __('Корпоративное управление') }}</a>
                        <a href="/uchenyy-sovet">{{ __('Учёный совет') }}</a>
                        <a href="/nauka-i-cifrovizaciya">{{ __('Наука и цифровизация') }}</a>
                    </div>
                    <div class="info-block wow fadeInDown">
                        <h4>{{ __('Поступление') }}</h4>
                        <a href="/obrazovatelnye-programmy-na-bakalavriat">{{ __('Бакалавриат') }}</a>
                        <a href="/obrazovatelnye-programmy-na-magistraturu-187">{{ __('Магистратура') }}</a>
                        <a href="/obrazovatelnye-programmy-na-doktoranturu-189">{{ __('Докторантура') }}</a>
                        <a href="/o-kolledzhe-192">{{ __('Колледж') }}</a>
                    </div>
                    <div class="info-block last wow fadeInUp">
                        <h4>{{ __('Присоединяйтесь') }}</h4>
                        <div class="d-flex flex-row">
                            <a href="https://www.instagram.com/agakaz_almaty"><img style="height: 33px; width: auto; margin: 3px;"
                                    src="/assets/images/footer_social/insta.png" /></a>
                            <a href="https://www.youtube.com/@civilaviationacademy"><img style="height: 33px; width: auto; margin: 3px;"
                                    src="/assets/images/footer_social/youtube.png" /></a>
                            <a href="https://www.facebook.com/agakaz2019/"><img style="height: 33px; width: auto; margin: 3px;"
                                    src="/assets/images/footer_social/facebook.png" /></a>
                            <a href="https://www.tiktok.com/@agakaz_almaty"><img style="height: 33px; width: auto; margin: 3px;"
                                    src="/assets/images/footer_social/tiktok.png" /></a>
                            <a href="https://t.me/civilaviationacademy"><img style="height: 33px; width: auto; margin: 3px;"
                                    src="/assets/images/footer_social/telegram.png" /></a>
                            <a href="https://wa.me/+77020244512"><img style="height: 33px; width: auto; margin: 3px;"
                                    src="/assets/images/footer_social/whatsapp.png" /></a>
                        </div>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_follow_toolbox last"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section id="bottom-bar">
        <div class="container">
            <div class="bottom-bar">
                <p style="font-size: 0.85vw; font-weight: lighter;">
                    © 1995 - <?php echo date("Y"); ?> {{ __('Академия Гражданской Авиации') }}</p>
            </div>
        </div>
    </section>

    <!-- Javascript -->
    <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/js/swiper-bundle.min.js"></script>
    <script src="/js/jquery.maskedinput.min.js"></script>
    <script src="/js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
    <script>
        // Swiper Initialization
        let swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            autoplay: {
                delay: 4000,
            },
        });
    </script>
    <script type="text/javascript" src="/js/copajs.js"></script>
    <script type="text/javascript" src="/js/countTo.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/jquery.appear.js"></script>
    <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
    <script id="aioa-adawidget"
        src="https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=#b8860b&token=&position=bottom_right">
    </script>
    @if (Request::url() == URL::to('/') . '/enrollee/bachelor')
        <script>
            var translation1profSubj = "{{ __('1-й профильный предмет') }}";
        </script>
        <script>
            var translationPhis2profSubj = "{{ __('Физика (2-ой проф. предм.)') }}";
        </script>
        <script>
            var translation2profSubj = "{{ __('2-й проф. предмет') }}";
        </script>
        <script src="/js/enrollee/bachelor.js"></script>
    @endif
    @if (Request::url() == URL::to('/') . '/enrollee/master')
        <script src="/js/enrollee/master.js"></script>
    @endif
    @if (Request::url() == URL::to('/') . '/enrollee/doctoral')
        <script src="/js/enrollee/doctoral.js"></script>
    @endif
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6154886463032954"></script> -->
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-634f98ee3660e716"></script>

    @yield('fancybox')
