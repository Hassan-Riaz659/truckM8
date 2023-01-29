 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-success navbar-shadow navbar-border navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="{{route('home')}}"><img class="brand-logo" alt="stack admin logo" src="{{asset('asset/app-assets/images/logo/stack-logo-light.png')}}">
                            <h2 class="brand-text">Stack</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu"></i></a></li>
                        
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Stack..." tabindex="0" data-search="template-search">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        
                       
                    
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="avatar avatar-online"><img src="{{asset('asset/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></div><span class="user-name">{{Auth::user()->first_name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{route('userProfile')}}"><i class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item" href="{{route('createLoad')}}"><i class="feather icon-check-square"></i> Create Load</a><a class="dropdown-item" href="{{route('home')}}"><i class="feather icon-message-square"></i>Show Loads</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="feather icon-power"></i>

                                                                         {{ __('Logout') }}</a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



