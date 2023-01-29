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

             <div class="col-lg-12">
                <div class="container-fluid">             	
                <div class="card">
                            <form action="{{route('editProfile')}}" method="Post" >
                                @csrf
                            <div class="card-header bg-success">
                                Account Settings
                            </div>
                                @if(Session::has('error'))

                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                                @endif


                         @if(Session::has('success'))
                            <div class="alert alert-success">
                                  {{Session::get('success')}}  
                            </div>
                         @endif

                            <div class="card-body">

                                <div class="row mb-5">
                                    <div class="col-md-4 mb-4">
                                        <div>Profile Information</div>
                                        <div class="text-muted small">These information are visible to the public.</div>
                                    </div>

                                    <div class="col-md-8">
                                    	                                  <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="form-control-label">Company Name</label>
                                                    <input class="form-control" name="company_name" required=""  value="{{Auth::user()->company_name}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="form-control-label">First Name</label>
                                                    <input class="form-control" name="first_name" required=""  value="{{Auth::user()->first_name}}">
                                                </div>
                                            </div>

                                         
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="form-control-label">Last Name</label>
                                                    <input class="form-control" name="last_name" required=""  value="{{Auth::user()->last_name}}">
                                                </div>
                                            </div>
  </div>
                                          <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="form-control-label">Mobile Number</label>
                                                    <input class="form-control" name="mobile" required=""  value="{{Auth::user()->mobile}}">
                                                </div>
                                            </div>

                                        </div>
                                      

                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="form-control-label">Email Address</label>
                                                    <input class="form-control" name="email" type="email" required="" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                        </div>

                                       
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5">
                                    <div class="col-md-4 mb-4">
                                        <div>Access Credentials</div>
                                        <div class="text-muted small">Leave credentials fields empty if you don't wish to change the password.</div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Current Password</label>
                                                    <input type="password" name="Current_password" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">New Password</label>
                                                    <input type="password" name="new_password" class="form-control">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">New Password Confirmation</label>
                                                    <input type="password" name="New_password_confrim" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-success text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        </div>

					</div>
                </div>

                	

                </div>
                
                <!--/ fitness info & twitter, facebook -->
            </div>
        </div>
    </div>




@endsection