<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>iDesign</title>
    <link rel="icon" type="image/png" href="{{ asset('user_assets/images/idesign/logo.jpg') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- css -->

    <link rel="stylesheet" href="{{ asset('user_assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/vendor/owl-carousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/vendor/photoswipe/photoswipe.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/vendor/photoswipe/default-skin/default-skin.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/vendor/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/style.css') }}" />
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('user_assets/vendor/fontawesome/css/all.min.css') }}" />
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{ asset('user_assets/fonts/stroyka/stroyka.css') }}" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="{{ asset('user_assets/css/lunar.css') }}">
    <script src="{{ asset('user_assets/js/lunar.js') }}" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-97489509-8");
    </script>

    @stack('styles')

    @livewireStyles
</head>

<body>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">



    <!-- site -->
    <div class="site">
        @livewire('header-component')
        <!-- site__body -->
        {{ $slot }}
        <!-- site__body / end -->
        @livewire('footer-component')
    </div>
    <!-- site / end -->
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- mobilemenu -->
    @livewire('mobile-menu-component')

    <!-- Product Calculator Model -->
    @livewire('product-calculator-component')
    <!-- Product Calculator Model end -->

    <!-- Modal -->
    <div class="modal fade modal-quickview" id="productView" tabindex="-1" role="dialog" aria-labelledby="productView"
        aria-hidden="true">
        @livewire('modal-component')
    </div>
    <!-- Modal Ends -->
    <!-- mobilemenu / end -->
    <!-- photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- photoswipe / end -->
    <!-- js -->
    <script src="{{ asset('user_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/number.js') }}"></script>
    <script src="{{ asset('user_assets/js/main.js') }}"></script>
    <script src="{{ asset('user_assets/js/header.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/svg4everybody/svg4everybody.min.js') }}"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        svg4everybody();
    </script>
    <script>
        var swiper = new Swiper('.mainbans', {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
                clickable: true,
            },
            autoplay: true,
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#toggle-button").click(function() {
                $("#search-body-id").toggle(500);
                $("#search_button_caption").toggle();
            });
        });
    </script>
    {{-- sweet alert --}}
    <script src="{{ asset('admin_assets/js/sweetalert.js') }}"></script>
    <script>
        window.addEventListener('swal:model', event => {
            swal({
                icon: event.detail.statuscode,
                text: event.detail.text,
                title: event.detail.title,
            });
        });
        window.addEventListener('swal:confirm', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.statuscode,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('delete', event.detail.id);
                    }
                });
        });
        window.addEventListener('swal:confirmstatus', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.statuscode,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willUpdate) => {
                    if (willUpdate) {
                        window.livewire.emit('statusupdate', event.detail.id);
                    }
                });
        });
    </script>
    <script type="text/javascript">
        var options = {
            "backdrop": "static",
            "show": true
        }
        window.addEventListener('showModel', function(event) {
            $('#productView').modal(options);
        });
        window.addEventListener('showProductCalculator', function(event) {
            $('#PriceCalcModal').modal(options);
        });
    </script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
