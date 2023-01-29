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
    <title>Create Drivers</title>
    
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
        	   <script src="{{asset('asset/app-assets/vendors/js/vendors.min.js')}}"></script>
    
            <script src="{{asset('asset/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
            <script src="{{asset('asset/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
            <script src="{{asset('asset/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('asset/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">

            <script src="{{asset('asset/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>


    <!-- END: Custom CSS-->

    
</head> 

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">



	   @include('includes.admin.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
         @include('includes.admin.navbar')

	<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- fitness target -->
		@if(Session::has('Success'))
            <div class="alert alert-success">
            	{{Session::get('Success')}}
            </div>
            @endif
                <div class="row">
            
                    <div class="col-3">
                   	</div>

                   	<div class="col-lg-6 col-md-10 col-sm-12">
						<form method="POST" action="{{route('store.drivers')}}" >
							@csrf
							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="name">Name</label>
							      <input type="text" class="form-control" required="Please enter name" name="name" id="name" placeholder="Enter driver  name">
							    </div>

							  </div>

							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="surname">Surname</label>
							      <input type="text" class="form-control" required="Please enter surname" name="surname" id="surname" placeholder="Enter Surname">
							    </div>
							    
							  </div>

							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="id_number">ID Number</label>
							      <input type="text" class="form-control" required="Please enter id_number" name="id_number" id="id_number" placeholder="Enter ID Number">
							    </div>
							    
							  </div>

							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="license_number">License Number</label>
							      <input type="text" class="form-control" required="Please enter name" name="license_number" id="license_number" placeholder="Enter License Number">
							    </div>
							    
							  </div>

							    <div class="form-row">
							    <div class="form-group col-md-12" >
							    <label for="license_expiry">License Expiry Date</label>
							 		<div class="input-group" >
						  			<input type="text" name="license_expiry" required="" id="pickadate" class="form-control" placeholder="License Expiry Date">
								  		</div>
							    </div>
							 </div>
			
										  <div class="form-row">
							    
							    <div class="form-group col-md-12">

							      <label for="name">Vehicle preference (choose One only ):</label>
								
							<select name="truck" style="margin-left: 0.5rem;margin-right: 0.5rem">
											<option value="">--Select--</option>
							@foreach($trucks as $truck)
											<option value="{{$truck->id}}">{{$truck->vehicle_name}}</option>
							@endforeach
										</select>
										

							<select name="trailer" >
											<option value="">--Select--</option>
							@foreach($trailers as $trailer)	
							
											<option value="{{$trailer->id}}">{{$trailer->vehicle_name}}</option>
							@endforeach			
							
										</select>
							</div>
</div>
							  
							  <button type="submit" class="btn btn-primary">Add Load</button>
							
							</form>

						</div>		

</div>
<div class="col-3">
</div>

</div>
</div>
</div>
</div>
    	<!-- BEGIN: Vendor JS-->
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



<script type="text/javascript">
    

    

    $(function(){

$( "#pickadate").pickadate();
    });

        $(function(){
$("#pickadate2").pickadate();

    });

</script>


</body>

</html>