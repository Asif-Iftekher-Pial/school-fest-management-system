  <section>
    <div class="topnav-bg">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-6">
            <p class="m-0 text-white"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@stemfest.com</p>
          </div>
          <div class="col-12 col-sm-6">
             @guest
            <p class="text-right text-white m-0"><a class="text-white" href="{{ route('login') }}">Login</a> | <a class="text-white"  href="{{ route('register') }}">Registration</a></p>
            @else
              <p class="text-right text-white m-0">
                Welcome {{ Auth::user()->name }} | 

                <a class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </p>
            @endguest

          </div>
        </div>
      </div>
    </div>
  </section>
<!-- ================Navber start============ -->
<section>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img class="img-fluid" src="{{ asset('main/dist/images/logo.jpg') }}" alt="Logo" style="max-height: 60px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
          
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              About us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ url('/mission_&_vission') }}">Mission & Vission</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/chairman_message') }}">Chairman Message</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/about_us') }}">About Stem Fest</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/terms_&_conditions') }}">Terms & Conditions</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Registration
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ url('/registration_process') }}">Registration Process</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/registration_notice') }}">Registration Notice</a>
              {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Program
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Committee</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Schedule</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Main Event</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Applicant School</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Result</a>
            </div>
          </li>
          <!-- <li class="nav-item"><a class="nav-link" href="#"></a></li> -->
          <li class="nav-item"><a class="nav-link" href="{{ url('/our_partners') }}">Partners</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gallery
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ url('/photo-gallery') }}">Photo Gallery</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/video-gallery') }}">Video Gallery</a>
              {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
            </div>
          </li>
        
          <li class="nav-item"><a class="nav-link" href="{{ url('/contact_us') }}">Contuct Us</a></li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>
</section>
<!-- ===================Navber End=================== -->