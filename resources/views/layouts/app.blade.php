{{-- resources/views/layouts/app.blade.php --}}
    <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Title -->
    <title>@yield('title', 'Edens Gröna')</title>
    <link rel="icon" href="{{ asset('assets/img/logo-img/logo.jpg?v=1') }}" type="image/x-icon" sizes="225x225" style="border-radius: 100%;">
    <!-- Favicon -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free-6.7.2-web/css/all.css?v=1') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css?v=4') }}">

    @stack('styles')
</head>

<body>
<!-- ========== HEADER ========== -->
@include('layouts.partials.header')
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Socials -->
    <div class="position-fixed d-md-block d-none social-media">
        <div class="mt-3">
            <ul class="list-inline p-0 m-0" id="medias">
                @php
                    $socialLinks = App\Models\SocialLink::where('is_active', true)->orderBy('order')->get();
                @endphp
                @foreach($socialLinks as $social)
                    <li class="list-inline-item mb-2">
                        <a class="social-media-i btn btn-soft-light btn-xs btn-icon"
                           href="{{ $social->url }}"
                           target="_blank">
                            <i class="{{ $social->icon }} icon1"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- End Socials -->
    @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
@include('layouts.partials.footer')
<!-- ========== END FOOTER ========== -->

<!-- Go To -->
<a class="js-go-to go-to go-to-btn position-fixed" href="javascript:;"
   data-hs-go-to-options='{
           "offsetTop": 700,
           "position": {
             "init": {
               "right": "1345px"
             },
             "show": {
               "bottom": "4rem"
             },
             "hide": {
               "bottom": "-2rem"
             }
           }
         }'>
    <i class="fa-solid fa-chevron-up fa-bounce fa-xl"></i>
</a>

<!-- JS Global Compulsory -->
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.js?v=1') }}"></script>
<!-- JS Implementing Plugins -->
<script src="{{ asset('assets/vendor/hs-header/dist/hs-header.min.js?v=1') }}"></script>
<!-- JS Front -->
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js?v=1') }}"></script>
<script src="{{ asset('assets/js/theme.min.js?v=1') }}"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/ionicons/ionicons.esm.js?v=1"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/ionicons/ionicons.js?v=1"></script>

<!-- JS Plugins Init. -->
<script>
    (function () {
        // INITIALIZATION OF HEADER
        new HSHeader('#header').init()

        // INITIALIZATION OF MEGA MENU
        new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })

        // INITIALIZATION OF SHOW ANIMATIONS
        new HSShowAnimation('.js-animation-link')

        // INITIALIZATION OF BOOTSTRAP VALIDATION
        HSBsValidation.init('.js-validate', {
            onSubmit: data => {
                data.event.preventDefault()
                alert('Submited')
            }
        })

        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        HSBsDropdown.init()

        // INITIALIZATION OF GO TO
        new HSGoTo('.js-go-to')

        // INITIALIZATION OF SWIPER
        function loadImage(path) {
            return new Promise(function (resolve) {
                const img = new Image()
                img.addEventListener('load', () => {
                    resolve()
                })
                img.src = path.replace(/url\(\"(.*?)\"\)/g, '$1')
            })
        }

        const $preloader = document.querySelector('.js-swiper-preloader')
        if ($preloader) {
            const promises = [...document.querySelectorAll('.js-swiper-slide-preload')]
                .map(slide => loadImage(window.getComputedStyle(slide).backgroundImage))

            Promise.all(promises)
                .then(() => {
                    $preloader.remove()

                    var sliderThumbs = new Swiper('.js-swiper-blog-journal-hero-thumbs', {
                        direction: 'vertical',
                        watchSlidesVisibility: true,
                        watchSlidesProgress: true,
                        slidesPerView: 3,
                        history: false,
                        on: {
                            'afterInit': function (swiper) {
                                swiper.el.style.opacity = 1
                                swiper.el.querySelectorAll('.js-swiper-pagination-progress-body-helper')
                                    .forEach($progress => $progress.style.transitionDuration = `${swiper.params.autoplay.delay}ms`)
                            }
                        }
                    })

                    var swiper = new Swiper('.js-swiper-blog-journal-hero', {
                        effect: 'fade',
                        autoplay: true,
                        loop: true,
                        pagination: {
                            el: '.js-swiper-blog-journal-hero-pagination',
                            clickable: true,
                        },
                        thumbs: {
                            swiper: sliderThumbs
                        }
                    })
                })
        }

        // INITIALIZATION OF STICKY BLOCKS
        new HSStickyBlock('.js-sticky-block', {
            targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
        })
    })()

    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        section.scrollIntoView({behavior: 'smooth'});
    }
</script>

@stack('scripts')
</body>
</html>
