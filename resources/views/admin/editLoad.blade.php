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
    <title>Edit Load</title>
    
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
						<form method="POST" action="{{route('storeEditLoad',$load->id)}}" >
							@csrf
							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="customer">Customer</label>
							      <input type="text" class="form-control" required="Please enter customer" value="{{$load->customer}}" name="customer" id="customer" placeholder="customer">
							    </div>
							  </div> 
							    <div class="form-row">
							    <div class="form-group col-md-12" >
							    <label for="pickup">Pickup Date</label>
							 		<div class="input-group" >
						  			<input type="text" name="pickup" required="" id="pickadate" value="{{$load->pickup_date}}" class="form-control" placeholder="Choose Pickup Date">
								  		</div>
							    </div>
							 </div>

							  <div class="form-row">
							    <div class="form-group col-md-12" >
							    <label for="destination">Destination Date</label>
							 		<div class="input-group" >
						  			<input type="text" name="destination" required="" value="{{$load->destination_date}}" id="pickadate2" class="form-control" placeholder="Choose Destination Date">
								  		</div>
							    </div>
							 </div>
							  
							 <div class="form-row">
							    <div class="form-group col-md-12" >
							    <label for="pickup_location">Pickup Location</label>
							 		<div class="input-group" >
						  		<input type="text" class="form-control" required="" id="pickup_location" value="{{$load->pickup_location}}" name="pickup_location" placeholder="Pickup Location">
						  		  		</div>
							    </div>
							 </div>


							 
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="drop_off_location">Drop Off Location</label>
							      <input type="text" class="form-control" required="" name="drop_off_location" id="drop_off_location" value="{{$load->drop_off_location}}" placeholder="Drop Off Location">
							    </div>
							    <div class="form-group col-md-6">
							      <label for="distance">Distance (KM)</label>
							        <input type="number" class="form-control" required="" value="{{$load->distance}}" name="distance" id="distance" placeholder="Distance in km">
							    </div>
							  
							     
							  
							  </div>
							    <div class="form-row">
							    
							    <div class="form-group col-md-6">
							 <label for="description">Description</label>
							      <input type="text" class="form-control" required="" value="{{$load->description}}" name="description" id="description" placeholder="Description">
							    </div>
							   
							    <div class="form-group col-md-6" >
							    
							 	 <label for="quantity">Quantity</label>
							      <input type="number" class="form-control" required="" value="{{$load->quantity}}" name="quantity" id="quantity" placeholder="Quantity">
							        


							    </div>
							 

							  </div>
							
							 <div class="form-row">
							    
							    <div class="form-group col-md-6">
							 <label for="customer_reference">Customer Reference</label>
							      <input type="text" class="form-control" required="" value="{{$load->customer_reference}}" name="customer_reference" id="customer_reference" placeholder="Customer Reference">
							    </div>
							   
							    <div class="form-group col-md-6" >
							    
							 	 <label for="load_number">Load Number</label>
							      <input type="number" class="form-control" required="" value="{{$load->load_number}}" name="load_number" id="load_number" placeholder="Load Number">
							        


							    </div>
							 

							  </div>
							
							 <div class="form-row">
							    
							    <div class="form-group col-md-6">
							 <label for="additional_details">Additional Details</label>
							      <input type="text" class="form-control" required="" name="additional_details" value="{{$load->additional_details}}" id="additional_details" placeholder="Additional Details">
							    </div>
							   
							    <div class="form-group col-md-6" >
							    
							 	 <label for="vehicle">Vehicle</label>
							      <input type="text" class="form-control" value="{{$load->vehicle}}" required="" name="vehicle" id="vehicle" placeholder="Vehicle">
							        


							    </div>
							 

							  </div>
							
							 <div class="form-row">
							    
							    <div class="form-group col-md-6">
							 <label for="driver">Driver</label>
							      <input type="text" class="form-control" required="" value="{{$load->driver}}" name="driver" id="driver" placeholder="Driver">
							    </div>
							   
							    <div class="form-group col-md-6" >
							    
							    <label for="rate">Rate</label>
							      <input type="number" class="form-control" name="rate" required="" id="rate" value="{{$load->Rate}}" placeholder="Rate">
							    </div>


							    </div>
							 

							  
							
							 <div class="form-row">
							    
							    <div class="form-group col-md-12">
							 
							 	 <label for="notes">Notes</label>
							     
							        
							   <textarea class="form-control" required="" cols="5" rows="5" name="notes" id="notes" placeholder="Notes"> {{$load->description}}</textarea>
							   
							 </div>

							  </div>
							
							  <button type="submit" class="btn btn-primary">Update</button>
							
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