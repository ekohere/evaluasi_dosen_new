
<html class="fixed">
<head>
    <title>{{isset($title)?$title:'Aplikasi Evaluasi Dosen Politani'}}</title>
    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="SIA POLITANI" />
    <meta name="description" content="Sistem Informasi Akademik Politeknik Samarinda">
    <meta name="author" content="TIM SIA POLITANI">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.min.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css')}}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/vendor/modernizr/modernizr.min.js')}}"></script>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
</head>
<body>
<!-- start: page -->
    @yield('content')
<!-- end: page -->

<!-- Vendor -->

<script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.min.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.min.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-placeholder/jquery-placeholder.min.js')}}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('assets/javascripts/theme.min.js')}}"></script>

<!-- Theme Custom -->
<script src="{{ asset('assets/javascripts/theme.custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('assets/javascripts/theme.init.min.js')}}"></script>

@yield('import_in_footer')

</body>
</html>