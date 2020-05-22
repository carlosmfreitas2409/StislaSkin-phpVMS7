<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta, Title & Favicon -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ public_asset('/assets/frontend/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ public_asset('/assets/frontend/img/favicon.png') }}">
        <title>@lang('errors.503.title') - {{ config('app.name') }}</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/fontawesome/css/all.min.css') }}">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/modules/prism/prism.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/css/style.css') }}">
        <link rel="stylesheet" href="{{ public_asset('/assets/frontend/stisla/css/components.css') }}">

        <!-- Start GA -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-94034622-3');
        </script>
        <!-- /END GA -->
    </head>
    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="page-error">
                        <div class="page-inner">
                            <h1>503</h1>
                            <div class="page-description">
                                @lang('errors.503.message')
                            </div>
                            <div class="page-search">
                                <div class="mt-3">
                                    <a href="{{ route('frontend.dashboard.index') }}">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ public_asset('/assets/frontend/stisla/modules/jquery.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/popper.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/tooltip.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/modules/moment.min.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/js/stisla.js') }}"></script>

        <!-- JS Libraies -->
        <script src="{{ public_asset('/assets/frontend/stisla/modules/prism/prism.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ public_asset('/assets/frontend/stisla/js/scripts.js') }}"></script>
        <script src="{{ public_asset('/assets/frontend/stisla/js/custom.js') }}"></script>
    </body>
</html>
