@extends('layouts.admin.master')
<!-- END: Head-->

<!-- BEGIN: Body-->
@section('title') Edit driver @endsection

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
      @if(Session::has('Success'))
            		<div class="alert alert-success">
            			{{Session::get('Success')}}
            		</div>
            	@endif
        <div class="content-wrapper">
            <div class="content-header row">
            	
            </div>

            <div class="content-body">
                <!-- fitness target -->
                <div class="row">
                	  <div class="col-2">
                  		</div>	
                    <div class="col-8">
                  <div class="container">
                           
					      <form method="POST" action="{{route('storeEditVehicle',$vehicle->id)}}" >
							@csrf
					     
					     	  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="unit_number">Unit Number</label>
							      <input type="text" class="form-control" value="{{$vehicle->unit_number}}" required="Please enter " name="unit_number" id="unit_number" placeholder="Please Unit Number">
							    </div>
							  </div>

							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="vehicle_name">Vehicle Name</label>
							      <input type="text" class="form-control" required="Please enter vehicle name" name="vehicle_name" id="vehicle_name" placeholder="Vehicle Name" value="{{$vehicle->vehicle_name}}">
							    </div>
							  </div>

					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="vehicle_description">Vehicle Description</label>
							      <input type="text" class="form-control" required="Please enter vehicle name" name="vehicle_description" id="vehicle_description" value="{{$vehicle->vehicle_description}}" placeholder="Vehicle Description">
							    </div>
							  </div>

							<div class="form-row">
							    
							    <div class="form-group col-md-12">
							   <div class="dropdown">
										<label>Vehicle Type</label>
										<select name="vehicle_type">
											<option value="">--Select--</option>
											<option value="0">Truck</option>
											<option value="1">Trailer</option>
										</select>
									</div>
							</div>
							  </div>
							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="registration_plate">Registration Plate</label>
							      <input type="text" class="form-control" required="Please enter Registration Plate" name="registration_plate" id="registration_plate" value="{{$vehicle->registration_plate}}" placeholder="Registration Plate">
							    </div>
							  </div>
							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="year">Year</label>
							      <input type="text" class="form-control" required="Please enter year" value="{{$vehicle->year}}" name="year" id="year" placeholder="Enter Year">
							    </div>
							  </div>

							  					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="year">Make</label>
							      <input type="text" class="form-control" required="Please enter Make" name="make" id="make" placeholder="Enter Make" value="{{$vehicle->make}}">
							    </div>
							  </div>

							  					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="vin">VIN</label>
							      <input type="text" class="form-control" required="Please enter vin" name="vin" id="vin" placeholder="Enter VIN" value="{{$vehicle->VIN}}">
							    </div>
							  </div>

							  					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="gross_combined_mass">Gross Combined Mass</label>
							      <input type="text" class="form-control" required="Please enter gcm" name="gross_combined_mass" id="gross_combined_mass" value="{{$vehicle->gross_combined_mass}}" placeholder="Enter Gross Combined Mass">
							    </div>
							  </div>


							   <button type="submit" class="btn btn-primary">Update</button>
							
							</form>
					     </div>
					     	
							 


                        </div>
                        <div class="col-2">
                  		</div>	
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection