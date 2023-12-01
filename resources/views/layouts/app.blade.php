<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="Spotlight+">

    <!-- icon -->
    <link rel="icon" href="/image/spotlighticon.png" type="image/png">
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
<link rel="stylesheet" href="https://laravelecommerce-production.up.railway.app/assets/css/custom.css">
  <!-- Exzoom -->


   <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap"
    rel="stylesheet">



<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

   @livewireStyles
</head>
<body>
    <div id="app">
       @include('layouts.inc.frontend.navbar')
        {{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  Spotlight+
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>--}}

        <main>
            @yield('content')
        </main>
    </div>
    <section class="contact">
        <div class="contact-info">
          <div class="first-info">
      
        
              <p>3245 Grant Street Longview, <br> TX united kingdom 765378</p>
              <p>01601348732</p>
              <p>saiudulahmed3080@gmail.com</p>
        
              <div class="social-icon">
                  <a href=""><i class='bx bxl-facebook'></i></a>
                  <a href=""><i class='bx bxl-twitter'></i></a>
                  <a href=""><i class='bx bxl-instagram'></i></a>
                  <a href=""><i class='bx bxl-youtube'></i></a>
                  <a href=""><i class='bx bxl-linkedin'></i></a>
              </div>
          </div>
          <div class="second-info">
              <h4>Suporte</h4>
              <p>Contate-nos</p>
              <p>Sobre a página</p>
              <p>Guia de tamanhos</p>
              <p>Política de devolução</p>
              <p>Privacidade</p>
          </div>
          <div class="third-info">
              <h4>Compre</h4>
              <p>Roupas Masculinas</p>
              <p>Roupas Femininas</p>
              <p>Vestimenta Infantil</p>
              <p>Móveis</p>
              <p>Descontos</p>
          </div>
          <div class="fourth-info">
              <h4>Empresa</h4>
              <p>Sobre</p>
              <p>Blog</p>
              <p>Afiliações</p>
              <p>Streaming</p>
              <p>Login</p>
          </div>
          <div class="five">
              <h4>Inscreva-se</h4>
              <p>Receive updates, Hot Deals, Discounts Sent Straight In Your Inbox Daily</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
              <p>Receive updates, Hot Deals, Discounts Sent Straight In Your Inbox Daily</p>
          </div>
        </div>
        </section>
        <div class="end-text">
        <p>Copyright © 2023. Todos os Direitos Reservados.</p>
        </div>
  
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer></script>
    <script src="/js/scripts.js" defer></script>
   

 

    
@livewireScripts

@stack('scripts')
</body>
</html>
