    <footer id="footer">
        <div class="container">
            <div class="footer">
                <div class="footer__info">
                    <div class="info-block wow fadeInDown">
                        <h4>{{ __('Контакты') }}</h4>
                        <p>
                            {{ __('Колл-центр Колледжа:') }}<br />
                            <a href="tel:87273469206"><i class="fa fa-phone-alt"></i> +7 (727) 346-92-06 (вн. 253)</a>
                            <a href="tel:87478198730"><i class="fa fa-phone-alt"></i> +7 (747) 819-87-30 (whatsapp)</a><br />

                            {{ __('ул. Закарпатская, 44') }}
                            {{ __('050039, Алматы') }} <br />
                            {{ __('Республика Казахстан') }}
                        </p>
                    </div>
                    <div class="info-block wow fadeInUp">
                        <h4>{{ __('О колледже') }}</h4>
                        <a href="/administraciya-kolledzha-236">{{ __('Управление') }}</a>
                        <a href="/normativnye-dokumenty-344">{{ __('Нормативные документы') }}</a>
                        <a href="/attestaciya-339">{{ __('Аттестация') }}</a>
                        <a href="/mezhdunarodnoe-sotrudnichestvo-408">{{ __('Сотрудничество') }}</a>
                    </div>
                    <div class="info-block wow fadeInDown">
                        <h4>{{ __('Поступление') }}</h4>
                        <a href="/priemnaya-komissiya-242">{{ __('Правила поступления') }}</a>
                        <a href="/priemnaya-komissiya-242">{{ __('Приемная комиссия') }}</a>
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
                    © <?php echo date("Y"); ?> {{ __('Авиационный колледж') }}</p>
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
