<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('dashboard')}}"><img src="{{asset('images/admin/logo_1.png')}}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}"><img src="{{asset('images/admin/logo.png')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{asset('images/admin/logo.png')}}" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <?php // $id = Crypt::encrypt(Auth::user()->id); ?>
                    {{-- <a href="{{route('adminprofile',$id)}}" class="dropdown-item">
                        <i class="fas fa-user text-primary"></i>
                        Profile
                    </a> --}}
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off text-primary"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <div class="nav-link">
                    <div class="profile-image">
                        <img src="{{asset('images/admin/logo.png')}}" alt="image"/>
                    </div>
                    <div class="profile-name">
                        <p class="name">
                            @if(Auth::user())
                                Welcome {{ Auth::user()->name }}
                            @endif
                        </p>
                        <p class="designation">
                            Admin
                        </p>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('slider')}}">
                    <i class="fa fa-images menu-icon"></i>
                    <span class="menu-title">Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about-dubai-category')}}">
                    <i class="fa fa-info-circle menu-icon"></i>
                    <span class="menu-title">About Dubai Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about-dubai-subcategory')}}">
                    <i class="fa  fa-th-large menu-icon"></i>
                    <span class="menu-title">About Dubai Sub category</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('local-restaurants')}}">
                    <i class="fa  fa-th menu-icon"></i>
                    <span class="menu-title">Local Restaurants </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('reviews')}}">
                    <i class="fa fa-star menu-icon"></i>
                    <span class="menu-title">Reviews </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('ourservices')}}">
                    <i class="fa  fa-wrench menu-icon"></i>
                    <span class="menu-title">Our Services </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('packages')}}">
                    <i class="fa fa-box menu-icon"></i>
                    <span class="menu-title">Packages</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('premiumactivity')}}">
                    <i class="fa fa-rupee-sign menu-icon"></i>
                    <span class="menu-title">Premium Activities</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('themes')}}">

                    <i class="fa fa-brush menu-icon"></i>
                    <span class="menu-title">Themes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('inquiry')}}">
                    <i class="fa fa-question menu-icon"></i>
                    <span class="menu-title">Inquiry</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">
                    <i class="fa fa-envelope menu-icon"></i>
                    <span class="menu-title">Contact</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
                  <i class="fas fa-cog menu-icon"></i>
                  <span class="menu-title">Settings</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="e-commerce">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('generalsetting')}}"> General Setting </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('contactssetting')}}"> Contact Setting</a></li>

                  </ul>
                </div>
              </li>

        </ul>
    </nav>
