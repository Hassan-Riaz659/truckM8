 <!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    
    <link rel="apple-touch-icon" href="{{asset('asset/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('asset/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/charts/leaflet.css')}}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/core/colors/palette-climacon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/fonts/meteocons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/css/pages/users.css')}}">        


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/css/style.css')}}">

               <script src="{{asset('asset/datetimePicker/jquery.min.js')}}"></script>
    
            <script src="{{asset('asset/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
            <script src="{{asset('asset/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
            <script src="{{asset('asset/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">

            <script src="{{asset('asset/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>


    <!-- END: Custom CSS-->

    
</head> 
<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
   @include('includes.admin.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
         @include('includes.admin.navbar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
        @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">PIXINVENT </a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <i class="feather icon-heart pink"></i></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
        <script src="{{asset('asset/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('asset/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/charts/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/extensions/jquery.knob.min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/charts/raphael-min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/charts/morris.min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/extensions/unslider-min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/charts/apexcharts/apexcharts.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('asset/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('asset/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('asset/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
    <script src="{{asset('asset/app-assets/js/scripts/pages/dashboard-fitness.js')}}"></script>
    <!-- END: Page JS-->


</body>
<!-- END: Body-->



</html>