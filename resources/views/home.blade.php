@extends('layouts.pocetna')




@section('items')

<div class="col-lg-12">

    <?php
        $items = App\item::all();
    ?>


    <div class="row">



        @if(count($items)>0)
        @foreach($items as $item)


        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                    <div class="card-body">
                            <h4 class="card-title">
                              <a  href="#">{{$item->name}}</a>
                            </h4>
                          </div>
                <div class="embed-responsive embed-responsive-16by9">
                <a href="/product/{{$item->id}}"><img class="card-img-top embed-responsive-item" src="images\{{$item->picture}}" alt=""></a>
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










    </div>


  </div>
@endsection

<!--Ubaci dropdown menu za spolove-->
@section('Dropdown')

@include('layouts.DropdownMenuSpol')

@endsection
