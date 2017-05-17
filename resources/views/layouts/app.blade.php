
<html class="fixed sidebar-light" lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{isset($title)?$title:'Aplikasi Prodigi PDAM'}}</title>
    <meta name="keywords" content="Aplikasi Prodigi PDAM" />
    <meta name="description" content="Sistem Informasi Aplikasi Prodigi PDAM">
    <meta name="author" content="TIM BRITECH SAMARINDA">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script type="text/javascript">
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.min.css')}}" />
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/jquery-ui.theme.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/morris.js/morris.min.css')}}" />

    @yield('specific_page_vendor_top')

    @if(Session::has('message'))
        <link rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.min.css')}}" />
    @endif

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme.min.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

    <!-- Head Libs -->
    <script src="{{asset('assets/vendor/modernizr/modernizr.min.js')}}"></script>

    <!--Custom Css -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />

</head>
<body>

<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="{{url('home')}}" class="logo">
                <img src="{{asset('assets/images/logo.png')}}" height="50" alt="Sistem Informasi Akademik Politani" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">
            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="{{asset('assets/images/!logged-user.jpg')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{asset('assets/images/!logged-user.jpg')}}" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">{{isset(Auth::user()->name)?Auth::user()->name:''}}</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{url('/profil/biodata')}}"><i class="fa fa-user"></i> Profil </a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{url('/password/change')}}"><i class="fa fa-key"></i> Ganti Password </a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        @include('layouts.menu')
                    </nav>

                    <hr class="separator" />

                    {{--<div class="sidebar-widget widget-tasks">
                        <div class="widget-header">
                            <h6>Projects</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content">
                            <ul class="list-unstyled m-none">
                                <li><a href="#">Porto HTML5 Template</a></li>
                                <li><a href="#">Tucson Template</a></li>
                                <li><a href="#">Porto Admin</a></li>
                            </ul>
                        </div>
                    </div>

                    <hr class="separator" />

                    <div class="sidebar-widget widget-stats">
                        <div class="widget-header">
                            <h6>Company Stats</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li>
                                    <span class="stats-title">Stat 1</span>
                                    <span class="stats-complete">85%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                            <span class="sr-only">85% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 2</span>
                                    <span class="stats-complete">70%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 3</span>
                                    <span class="stats-complete">2%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                            <span class="sr-only">2% Complete</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>--}}
                </div>

                <script type="text/javascript">
                    // Maintain Scroll Position
                    if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                            var initialPosition = localStorage.getItem('sidebar-left-position'),
                                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                            sidebarLeft.scrollTop = initialPosition;
                        }
                    }
                </script>

            </div>

        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>{{isset($title)?$title:'Aplikasi Prodigi PDAM'}}</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Dashboard</span></li>
                    </ol>

                    <a class="sidebar-right-toggle"><i ></i></a>
                </div>
            </header>


            @if( Session::has('error_message'))
                <div class="row">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <strong>{{ Session::get('error_message')}}</strong>
                    </div>
                </div>
            @endif

            <!-- start: page -->
            @yield('content')
            <!-- end: page -->
        </section>
    </div>


</section>

<!-- Vendor -->

<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-placeholder/jquery-placeholder.min.js')}}"></script>

<!-- Specific Page Vendor -->
<script src="{{asset('assets/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-appear/jquery-appear.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>
<script src="{{asset('assets/vendor/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/vendor/flot.tooltip/flot.tooltip.min.js')}}"></script>
<script src="{{asset('assets/vendor/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('assets/vendor/flot/jquery.flot.categories.min.js')}}"></script>
<script src="{{asset('assets/vendor/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-sparkline/jquery-sparkline.min.js')}}"></script>
<script src="{{asset('assets/vendor/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/vendor/morris.js/morris.min.js')}}"></script>
<script src="{{asset('assets/vendor/gauge/gauge.min.js')}}"></script>
<script src="{{asset('assets/vendor/snap.svg/snap.svg.min.js')}}"></script>
<script src="{{asset('assets/vendor/liquid-meter/liquid.meter.min.js')}}"></script>
{{--<script src="{{asset('assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>--}}

@yield('specific_page_vendor_bottom')

{{--<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>--}}

<!-- Theme Base, Components and Settings -->
<script src="{{asset('assets/javascripts/theme.min.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('assets/javascripts/theme.init.min.js')}}"></script>

<!-- Examples -->
{{--<script src="{{asset('assets/javascripts/dashboard/examples.dashboard.js')}}"></script>--}}


<!-- Examples -->
{{--<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
<script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
<script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>--}}

@yield('import_in_footer')

@if(Session::has('message'))
    <?php list($type, $message) = explode('|', Session::get('message')); ?>
    <script src="{{asset('assets/vendor/pnotify/pnotify.custom.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var notice = new PNotify({
                title: 'Pesan',
                text: '{{$message}}',
                addclass: 'notification-success click-2-close',
                icon: 'fa fa-twitter',
                type: '{{$type}}',
                hide: false,
                buttons: {
                    closer: false,
                    sticker: false
                }
            });

            notice.get().click(function() {
                notice.remove();
            });
        });
    </script>
@endif

</body>
</html>
