@extends('layouts.pocetna')


<!--Ubaci dropdown menu za spolove-->
@section('Dropdown')

@include('layouts.DropdownMenuSpol')

@endsection

@section('items')

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Kategorije/Spol </div>
      <div class="list-group list-group-flush">
        <button onclick='location.href="/kategorijeOwner/2"' class="list-group-item list-group-item-action bg-light">Male</button>
        <button onclick='location.href="/kategorijeOwner/3"' class="list-group-item list-group-item-action bg-light">Female</button>
        <button onclick='location.href="/kategorijeOwner/1"' class="list-group-item list-group-item-action bg-light">Unisex</button>
        <button onclick='location.href="/kategorijeOwner/4"' class="list-group-item list-group-item-action bg-light">Child</button>
      </div>
    </div>
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


@endsection