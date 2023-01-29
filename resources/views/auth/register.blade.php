@extends('layouts.app')

@section('content')
<body class="horizontal-layout horizontal-menu 1-column  bg-cyan bg-lighten-2 blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset('asset/app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo">
                                    </div>
                                    
                                </div>

                                <div class="card-content">
                                 

                                    <div class="card-body pt-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="company_name">{{ __('Company Name') }}</label>
                 <input id="company_name" placeholder="Company Name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                                 @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="first_name">{{ __('First Name') }}</label>
 <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                <label for="last_name">{{ __('Last Name') }}</label>
                                                 <input id="last_name" placeholder="Last Name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </fieldset>
                                           

                             <fieldset class="form-group floating-label-form-group mb-1">
                    <label for="email">{{ __('E-Mail Address') }}</label>
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                             </fieldset>

                                                                                          <fieldset class="form-group floating-label-form-group mb-1">
                    <label for="mobile">{{ __('Mobile Number') }}
</label>
<input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Mobile Number" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                             </fieldset>


                                                                                          <fieldset class="form-group floating-label-form-group mb-1">
                    <label for="password">{{ __('Password') }}</label>
<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                             </fieldset>



                                                                                          <fieldset class="form-group floating-label-form-group mb-1">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
 <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                             </fieldset>


                 


                                @if (Route::has('password.request'))
                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="{{ route('password.request') }}" class="card-link">                                  

                                        {{ __('Forgot Your Password?') }}
                                    </a></div>
                                     @endif
                                            
                                            <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-user"></i> Register</button>
                                        </form>
                                    </div>
                                    <div class="card-body pt-0">
                                        <a href="{{ route('login') }}" class="btn btn-outline-danger btn-block"><i class="feather icon-unlock"></i> Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('asset/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('asset/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('asset/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('asset/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('asset/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('asset/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
    <script src="{{asset('asset/app-assets/js/scripts/forms/form-login-register.js')}}"></script>
    <!-- END: Page JS-->






@endsection


