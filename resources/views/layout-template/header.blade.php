<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset('img/icon.png')}}" width="250" height="400" alt="InternetCtrl">
        {{-- <h1>Logis</h1> --}}
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{url('/')}}" style="font-size: 20px"class="active">Inicio</a></li>
          <li><a href="{{url('/')}}" style="font-size: 20px">Contact</a></li>
          <li><a class="get-a-quote"  style="font-size: 20px" href="login">Iniciar Sesión</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header>