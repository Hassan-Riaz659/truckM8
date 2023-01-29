@extends('layouts.admin.master')
<!-- END: Head-->

<!-- BEGIN: Body-->
@section('title') Show Vehicles @endsection

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            	@if(Session::has('Success'))
            		<div class="alert alert-success">
            			{{Session::get('Success')}}
            		</div>
            	@endif
            </div>
            <div style="margin-bottom: 0.5rem;">
            <a class="btn btn-primary" style="color: #fff;" type="button" data-toggle="modal" data-target="#exampleModal" >Add Vehicle</a>
            <!-- Modal -->

            					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Vehicle Details</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form method="POST" action="{{route('create.vehicle')}}" >
							@csrf
					      <div class="modal-body">
					        
							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="unit_number">Unit Number</label>
							      <input type="text" class="form-control" required="Please enter " name="unit_number" id="unit_number" placeholder="Please Unit Number">
							    </div>
							  </div>

							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="vehicle_name">Vehicle Name</label>
							      <input type="text" class="form-control" required="Please enter vehicle name" name="vehicle_name" id="vehicle_name" placeholder="Vehicle Name">
							    </div>
							  </div>

					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="vehicle_description">Vehicle Description</label>
							      <input type="text" class="form-control" required="Please enter vehicle name" name="vehicle_description" id="vehicle_description" placeholder="Vehicle Description">
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
							      <input type="text" class="form-control" required="Please enter Registration Plate" name="registration_plate" id="registration_plate" placeholder="Registration Plate">
							    </div>
							  </div>
							  							  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="year">Year</label>
							      <input type="text" class="form-control" required="Please enter year" name="year" id="year" placeholder="Enter Year">
							    </div>
							  </div>

							  					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="year">Make</label>
							      <input type="text" class="form-control" required="Please enter Make" name="make" id="make" placeholder="Enter Make">
							    </div>
							  </div>

							  					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="vin">VIN</label>
							      <input type="text" class="form-control" required="Please enter vin" name="vin" id="vin" placeholder="Enter VIN">
							    </div>
							  </div>

							  					  <div class="form-row">
							    
							    <div class="form-group col-md-12">
							      <label for="gross_combined_mass">Gross Combined Mass</label>
							      <input type="text" class="form-control" required="Please enter gcm" name="gross_combined_mass" id="gross_combined_mass" placeholder="Enter Gross Combined Mass">
							    </div>
							  </div>


					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Add</button>
					      </div>
					     </form>
					    </div>
					  </div>
					</div>

            </div>
            <div class="content-body">
                <!-- fitness target -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="table">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Unit number</th>
								      <th scope="col">Vehicle Name</th>
								      <th scope="col">Description</th>
								      <th scope="col">Type</th>
								      <th scope="col">Registration Plate</th>
								      <th scope="col">Year</th>
								      <th scope="col">Make</th>
								      <th scope="col">VIN</th>
								      <th scope="col">Gross Combined Mass</th>
								      <th scope="col">Action</th>
								    </tr>
								  </thead>
								  <tbody>
									@foreach($vehicles as $vehicle)
								    <tr>

								      <th scope="row">{{$vehicle->id}}</th>
								 	  <th >{{$vehicle->unit_number}}</th>
								      <td>{{$vehicle->vehicle_name}}</td>
								      <td>{{$vehicle->vehicle_description}}</td>
								
								     @if($vehicle->vehicle_type == 0)
								      <td>Truck</td>
								      @elseif($vehicle->vehicle_type == 1)
								      	<td>Trailer</td>
										@else
									    I don't have any records!
								      @endif
								

								      <td>{{$vehicle->registration_plate}}</td>
								      <td>{{$vehicle->year}}</td>
								      <td>{{$vehicle->make}}</td>
								      <td>{{$vehicle->VIN}}</td>
								      <td>{{$vehicle->gross_combined_mass}}</td>
								      <td><a href="{{route('edit.vehicle',$vehicle->id)}}" class="btn btn-info">Edit</a></td></td>	

								    </tr>
								 	@endforeach
								  </tbody>
								</table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection