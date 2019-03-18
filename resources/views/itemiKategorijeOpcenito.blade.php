@extends('layouts.pocetna')


@section('items')

<div class="row">


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



@endsection


<!--Ubaci dropdown menu za iteme-->
@section('Dropdown')


@if($itemiKategorije == 2)
@include('layouts.MaleDropDownMenu')
@elseif($itemiKategorije == 3)
@include('layouts.FemaleDropDownMenu')
@elseif($itemiKategorije == 4)
@include('layouts.ChildDropDownMenu')
@elseif($itemiKategorije == 1)
@include('layouts.UnisexDropDownMenu')
@endif


@endsection
