<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genshin Laravel API</title>

    {{-- Font CSS --}}
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    {{-- Theme CSS --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/vendor.min.css')}}">

    {{-- Main CSS --}}
    @yield('css')
</head>

<body>
    @include('layouts.nav')

    @yield('main-content')

    @include('layouts.foot')

    {{-- Bootstrap Script --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="{{ URL::asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/theme.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/theme.min.js') }}"></script>

    @yield('script')
    @stack('script')

    <script>
        $(document).on('ready', function () {
          // INITIALIZATION OF HEADER
          var header = new HSHeader($('#header')).init();

          // INITIALIZATION OF MEGA MENU
          var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
            desktop: {
              position: 'left'
            }
          }).init();
    
          // INITIALIZATION OF FANCYBOX
          $('.js-fancybox').each(function () {
            var fancybox = $.HSCore.components.HSFancyBox.init($(this));
          });
    
          // INITIALIZATION OF SLICK CAROUSEL
          $('.js-slick-carousel').each(function() {
            var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
          });
    
          // INITIALIZATION OF AOS
          AOS.init({
            duration: 650,
            once: true
          });
    
          // INITIALIZATION OF GO TO
          $('.js-go-to').each(function () {
            var goTo = new HSGoTo($(this)).init();
          });

          // INITIALIZATION OF UNFOLD
            var unfold = new HSUnfold('.js-hs-unfold-invoker').init();
        });
    </script>
</body>

</html>