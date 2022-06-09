<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>QiDZ - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>


  <header>
    <div class="top-header">
      <div class="th-inner">
        <div class="th-left"><p>Download QiDZ mobile app now <a href=""><Strong>Click Here</Strong></a></p></div>
        <div class="th-right">
          <div class="th-right-link">
           
            @if (Route::has('login'))
            <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
              @auth
              @if(Auth::user()->is_admin == 1)
              <a href="{{ url('/Admin/Home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
              @else
              <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
              @endif
              @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

              @if (Route::has('register'))
              <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
              @endif
              @endauth
              <!-- </div> -->
              @endif
              <!--  <a href="#">Login</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Registration</a> -->
            </div>
            <div class="th-right-dropdown">
              <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 City
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">India</a>
                <a class="dropdown-item" href="#">US</a>
                <a class="dropdown-item" href="#">Australia</a>
              </div>
            </div>
          </div>
          <div class="th-right-dropdown last-field">
            <div class="dropdown">
              <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               English
             </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">India</a>
              <a class="dropdown-item" href="#">US</a>
              <a class="dropdown-item" href="#">Australia</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="nav-left">
        <a class="navbar-brand" href="#"><img src="{{asset('assets/img/logo.png')}}"></a>
      </div>
      <div class="nav-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><img src="{{asset('assets/img/down_ic.png')}}">&nbsp;&nbsp;Download <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="{{asset('assets/img/blog_ic.png')}}">&nbsp;&nbsp;Our Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"><img src="{{asset('assets/img/contact_ic.png')}}">&nbsp;&nbsp;Contact Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="assets/img/more_ic.png">&nbsp;&nbsp;More
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>