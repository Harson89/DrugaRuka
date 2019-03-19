@extends('layouts.pocetna')


<!--Ubaci dropdown menu za kategorije-->
@section('Dropdown')

@include('layouts.MaleDropDownMenu')

@endsection


<?php
$items = App\item::where('gender', 2)->orWhere('gender',0)->get();
?>

@section('items')

<div class="row">

@if(count($items)>0)
@foreach($items as $item)


<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <a href="/product/{{$item->id}}"><img id="slikaProdukta" src="{{ URL::to('images') }}/{{ $item->picture}}" alt="error">
      <div class="card-body">
        <h4 class="card-title">
          <a  href="#">{{$item->name}}</a>
        </h4>

      </div>

      <div class="card-footer">
            <h5 class="cijena">{{$item->price}}€</h5>
      </div>
    </div>
  </div>

<br>
<br>


@endforeach
@else
<p> No products yet </p>
@endif



@endsection