@extends('layouts.pocetna')


<!--Ubaci dropdown menu za spolove-->
@section('Dropdown')

@include('layouts.DropdownMenuSpol')

@endsection



@section('items')

<div class="d-flex" id="wrapper">

<?php

if($idKategorije == 2) 
    {
        $trenutnaKategorija = App\category::where('gender', 2)->orWhere('gender',0)->get();
        
    }

    if($idKategorije == 3) 
    {
        $trenutnaKategorija = App\category::where('gender', 3)->orWhere('gender',0)->get();
    }

    if($idKategorije == 1) 
    {
        $trenutnaKategorija = App\category::where('gender', 1)->orWhere('gender',0)->get();
    }

    if($idKategorije == 4) 
    {
        $trenutnaKategorija = App\category::where('gender', 4)->orWhere('gender',0)->get();
    }


?>

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Kategorije </div>
      <div class="list-group list-group-flush">
      <button onclick='window.history.go(-1);' class="list-group-item list-group-item-action bg-light"><- Spol</button>
      @foreach($trenutnaKategorija as $imeTrenutneKategorije) 
        <a onclick='location.href="/itemiKategorije/{{$imeTrenutneKategorije->id}}"' class="list-group-item list-group-item-action bg-light">{{$imeTrenutneKategorije->name}}</a>
      @endforeach
        

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