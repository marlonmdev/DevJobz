<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DevJobz</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('images/mlogo.png') }}" rel="icon">


  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  
  <script src="{{ asset('assets/vendor/alpinejs/alpinejs.js') }}" defer></script>
  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">DevJobz</a></h1>

      <!-- ======= Navbar ======= -->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          
          @auth
            <li><a href="/listings/manage"><i class="bi bi-gear-fill fs-6"></i> MY LISTINGS</a></li>
            
            <li class="dropdown"><a href="#" class="text-uppercase"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="/users/edit">CHANGE PASSWORD</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">LOGOUT</a></li>
              </ul>
            </li>
            
            
            <li class="d-lg-none d-sm-block"><a href="/listings/create">POST A JOB</a></li>
          @else
            <li><a href="/register">REGISTER</a></li>
            <li class="d-lg-none d-sm-block"><a href="/login">LOGIN</a></li>          
          @endauth
          
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- End Navbar -->
      
      @auth
      @else
        <a href="/login" class="login-btn d-none d-lg-block">LOGIN</a>
      @endauth
    </div>
  </header>
  <!-- End Header -->
  
  {{ $slot }}
  
  <x-flash-alert />
  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright text-light fs-5">
          &copy; Copyright 2023 <span class="text-warning">DevJobz</span>. All Rights Reserved
        </div>
  
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      
      <div class="mx-3 text-md-right pt-md-0 d-none d-lg-block">
        <a href="/listings/create" class="btn btn-primary btn-rounded"> &nbsp; POST A JOB &nbsp;</a>
      </div>
      
    </div>
  </footer>
  <!-- End Footer -->
  
  <x-logout-modal />

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
</body>

</html>
