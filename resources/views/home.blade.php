@extends('layouts.pocetna')




@section('items')

<div class="col-lg-12">



    <div class="row">








      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a  href="#">Item One</a>
            </h4>


          </div>

          <div class="card-footer">
                <h5 class="cijena">$24.99</h5>
          </div>
        </div>
      </div>



    </div>


  </div>
@endsection

<!--Ubaci dropdown menu za spolove-->
@section('Dropdown')

@include('layouts.DropdownMenuSpol')

@endsection
