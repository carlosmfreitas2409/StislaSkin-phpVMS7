<!DOCTYPE html>
<html>
    <head>
        <!-- Meta, Title & Favicon -->
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <link rel="shortcut icon" type="image/png" href="{{ public_asset('/assets/img/favicon.png') }}"/>
        <title>@yield('title') &mdash; {{ config('app.name') }}</title>

        <!-- phpVMS 7 REQUIRED - Start of required lines block. DON'T REMOVE THESE LINES! They're required or might break things - phpVMS 7 REQUIRED -->
        <meta name="base-url" content="{!! url('') !!}">
        <meta name="api-key" content="{!! Auth::check() ? Auth::user()->api_key: '' !!}">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <!-- phpVMS 7 REQUIRED - End the required lines block - phpVMS 7 REQUIRED-->

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/fontawesome/css/all.min.css') }}">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/jqvmap/dist/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/weather-icon/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/weather-icon/css/weather-icons-wind.min.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/select2/dist/css/select2.min.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/css/style.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/css/components.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/css/custom.css') }}">

        <!-- Start GA -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-94034622-3');
        </script>
        <!-- /END GA -->

        <!-- phpVMS 7 REQUIRED - Custom CSS & Js -->
        <link href="{{ public_mix('/assets/frontend/stisla/css/phpvms/vendor.css') }}" rel="stylesheet"/>
        <style>
            @yield('css')
        </style>

        <script>
            @yield('scripts_head')
        </script>
        <!-- phpVMS 7 REQUIRED - End Custom CSS & Js -->
    </head>
    <body>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <!-- Navbar -->
                @include('nav')
                <!-- End Navbar -->

                <!-- Main Content (These should go where you want your content to show up) -->
                <div class="main-content">
                    <section class="section">
                        @include('flash.message')
                        @yield('content')
                    </section>
                </div>
                <!-- End Main Content -->

                <!-- Footer -->
                {{-- Please keep the copyright message somewhere, as-per the LICENSE file!!! Thanks!! --}}
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; <?php echo date('Y'); ?> <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                    </div>
                    <div class="footer-right">
                        CrewCenter by <a href="mailto:carlosmfreitas05@gmail.com">Carlos Eduardo</a> | Powered by <a href="http://www.phpvms.net" target="_blank">phpVMS</a>
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
        </div>

        {{-- phpVMS REQUIRED - Start of the required tags block. Don't remove these or things will break!! - phpVMS REQUIRED --}}
        <script src="{{ public_mix('/assets/global/js/vendor.js') }}"></script>
        <script src="{{ public_mix('/assets/frontend/js/app.js') }}"></script>

        {{-- It's probably safe to keep this to ensure you're in compliance with the EU Cookie Law https://privacypolicies.com/blog/eu-cookie-law --}}
        @yield('scripts')
        <script>
            window.addEventListener("load", function () {
                window.cookieconsent.initialise({
                palette: {
                    popup: {
                    background: "#edeff5",
                    text: "#838391"
                    },
                    button: {
                    "background": "#067ec1"
                    }
                },
                position: "bottom",
                })
            });
        </script>

        <script>
            $(document).ready(function () {
                $(".select2").select2({width: 'resolve'});
            });
        </script>
        {{-- phpVMS REQUIRED - End the required tags block - phpVMS REQUIRED --}}

        <!-- General JS Scripts -->
        <script src="{{ public_asset('/assets/frontend/stisla/modules/jquery.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/popper.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/tooltip.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/nicescroll/jquery.nicescroll.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/moment.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/js/stisla.js') }}"></script>

        <!-- JS Libraies -->
        <script src="{{ public_asset('/assets/frontend/stisla/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/chart.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/sweetalert/sweetalert2.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ public_asset('/assets/frontend/stisla/js/scripts.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/js/custom.js') }}"></script>

        <!-- NiceScroll -->
        <script>$("body").niceScroll({fixed:true});</script>

        {{--
            Google Analytics tracking code. Only active if an ID has been entered
            You can modify to any tracking code and re-use that settings field, or
            just remove it completely. Only added as a convenience factor
        --}}
        @php
            $gtag = setting('general.google_analytics_id');
        @endphp
        @if($gtag)
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '{{ $gtag }}');
            </script>
        @endif
        {{-- End of the Google Analytics code --}}
    </body>
</html>
