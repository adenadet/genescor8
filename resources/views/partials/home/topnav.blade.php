<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="/" class="navbar-brand">
            <img src="/img/logo/genescor-square.png" alt="Genescor Logo" class="brand-image">
            <span class="brand-text font-weight-light"><b>GENESCOR</b></span>
        </a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        Services <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="fas fa-file-medical mr-2 text-danger"></i> Consultations</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-pills mr-2 text-danger"></i> Prescriptions</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-file-pdf mr-2 text-danger"></i> Lab Tests</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-copy mr-2 text-danger"></i> Health Management</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/pharmacy" class="nav-link">E-Pharmacy</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        Providers <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu border-0 shadow">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-md mr-2 text-danger"></i> Doctors</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-pills mr-2 text-danger"></i> Hospitals/Clinics</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-file mr-2 text-danger"></i> Diagnostics</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/stories" class="nav-link">SCW Community</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link">Contact Us</a>
                </li>
                @auth
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/app" class="nav-link">App Area</a>
                </li> 
                @endauth
            </ul>
        </div>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          @auth
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->first_name }}</a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">       
                  <a href="{{ url('/home') }}" class="dropdown-item">Home</a>     
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          <li>
              <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-user"></i></a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="{{ route('login') }}" class="dropdown-item"><i class="fa fa-key mr-1"></i>Log in</a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('register') }}" class="dropdown-item"><i class="fa fa-user-plus mr-1"></i>Register</a>
              </div>
          </li>
          <li class="nav-item"><a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-shopping-cart"></i></a></li>
          @else
          <li class="nav-item"><a class="nav-link btn btn-danger" style="color:#FFF;" href="{{route('register')}}">Register</a></li>
          @endauth
        </ul>
    </div>
</nav>