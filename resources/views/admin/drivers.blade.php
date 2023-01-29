@extends('layouts.admin.master')
<!-- END: Head-->

<!-- BEGIN: Body-->
@section('title') Show drivers @endsection

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
                    <div class="col-12">
                        <div class="card">
                            <table class="table">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Name</th>
								      <th scope="col">Surname</th>
								      <th scope="col">ID Number</th>
								      <th scope="col">License Number</th>
								      <th scope="col">License Expiry Date</th>
								      <th scope="col">Vehicle Preference</th>
								      <th scope="col">Action</th>
								    </tr>
								  </thead>
								
								  <tbody>
								  	@foreach($drivers as $driver)
									<tr>
									<td>{{$driver->id}}</td>
									<td>{{$driver->name}}</td>
									<td>{{$driver->surname}}</td>
									<td>{{$driver->id_number}}</td>
									<td>{{$driver->license_number}}</td>
									<td>{{$driver->license_expiry_date}}</td>
									<td>{{$driver->vehicle_preference}}</td>
									<td>		      
                                            <a href="{{route('edit.driver',$driver->id)}}" class="btn btn-info">Edit</a></td>
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