<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Druga ruka') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-static-top">
    <div class="container">

    <!--Dropdown Menu-->


    @yield('Dropdown')

      <a class="navbar-brand" href="{{ url('/') }}">Druga Ruka</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">


         <!--GOST -->
          @if(Auth::guest())

            <!-- LOGIN -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>

            <!-- LOGIN -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>

          <!-- PRIJAVLJEN KORISNIK -->
          @else



          <li class="nav-item">
                <a class="nav-link" href="/myProfile">My Profile</a>
          </li>

          <!-- SHOPPING CART -->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/myCart')}}">Cart</a>
          </li>

          <!-- LOGOUT -->
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>


        @endif
        </ul>
      </div>
    </div>
  </nav>

        <div id='sadrzaj'>
            @yield('content')
        </div>

    </div>


</body>
</html>
