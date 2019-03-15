@extends('layouts.app')

@section('content')
<div class="container">
      <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Druga Ruka</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          @if(Auth::guest())

          <!-- LOGIN -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>

          <!-- LOGIN -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>

          @else

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



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</div>
@endsection
