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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                    <label for="password">{{ __('Password') }}</label>
<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                             </fieldset>



                  <fieldset class="form-group floating-label-form-group mb-1">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                   </fieldset>

                 



                                            
                                            <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-user"></i> {{ __('Login') }}</button>

                                        </form>
                                                                   @if (Route::has('password.request'))
                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="{{ route('password.request') }}" class="card-link">                                  

                                        {{ __('Forgot Your Password?') }}
                                    </a></div>
                                     @endif
                                    </div>
                                    <div class="card-body pt-0">
                                        <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block"><i class="feather icon-unlock"></i> Register</a>
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
