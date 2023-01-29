@extends('layouts.admin.master')
<!-- END: Head-->

<!-- BEGIN: Body-->
@section('title') Welcome @endsection

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- fitness target -->
                <div class="row">
                @if(Session::has('success'))
                <div class="alert alert-success">
                	{{Session::get('success')}}
                </div>
                @endif
             <div class="col-lg-12">
                     	
                   <table class="table table-responsive">
						  <thead>
						    <tr>
						      <th>#</th>
						      <th>Company Name</th>
						      <th>Customer</th>
						      <th>Pickup Date</th>
						      <th>Destination Date</th>
						      <th>Pickup Location</th>
						      <th>DropOff Location</th>
						      <th>Distance</th>
						      <th>Description</th>
						      <th>Quantity</th>
						      <th>Customer Reference</th>
						      <th>Load Number</th>
						      <th>Additional Details</th>
						      <th>Vehicle</th>
						      <th>Driver</th>
						      <th>Notes</th>
						      <th>Rate</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  @foreach($user->loads as $load)
						    <tr>
						      <th scope="row">{{$load->id}}</th>
						      <td>{{$user->company_name}}</td>
						      <td>{{$load->customer}}</td>
						      <td>{{$load->pickup_date}}</td>
						      <td>{{$load->destination_date}}</td>
						      <td>{{$load->pickup_location}}</td>
						      <td>{{$load->drop_off_location}}</td>
						      <td>{{$load->distance}}</td>
						      <td>{{$load->description}}</td>
						      <td>{{$load->quantity}}</td>
						      <td>{{$load->customer_reference}}</td>
						      <td>{{$load->load_number}}</td>
						      <td>{{$load->additional_details}}</td>
						      <td>{{$load->vehicle}}</td>
						      <td>{{$load->driver}}</td>
						      <td>{{$load->notes}}</td>
						      <td>{{$load->Rate}}</td>
						      <td>
                                            <a href="{{route('EditLoad',$load->id)}}" class="btn btn-info">Edit</a></td>

						    </tr>
						    @endforeach
						  </tbody>
						</table>
				<!-- Button trigger modal -->


                		</div>


                	

                </div>
                
                <!--/ fitness info & twitter, facebook -->
            </div>
        </div>
    </div>

@endsection