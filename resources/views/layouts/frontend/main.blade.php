<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/backend/assets/img/JobSentra.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/aos.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style.css">
    <link href="{{ asset('assets') }}/backend/assets/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <title>jobsentra.com</title>
    @yield('css')
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('layouts.frontend.components.navbar')

    @yield('content')

    @include('layouts.frontend.components.footer')

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('assets') }}/frontend/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/aos.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/moment.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/daterangepicker.js"></script>

    <script src="{{ asset('assets') }}/frontend/js/typed.js"></script>
    <script>
        $(function() {
            var slides = $('.slides'),
                images = slides.find('img');

            images.each(function(i) {
                $(this).attr('data-id', i + 1);
            })

            var typed = new Typed('.typed-words', {
                strings: [" jobsentra.com"],
                typeSpeed: 80,
                backSpeed: 80,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
                showCursor: true,
                preStringTyped: (arrayPos, self) => {
                    arrayPos++;
                    console.log(arrayPos);
                    $('.slides img').removeClass('active');
                    $('.slides img[data-id="' + arrayPos + '"]').addClass('active');
                }

            });
        })
    </script>

    <script src="{{ asset('assets') }}/frontend/js/custom.js"></script>

    @stack('script')

</body>

</html>
