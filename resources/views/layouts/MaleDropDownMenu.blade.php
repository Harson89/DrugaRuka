<?php
$maleCategories = App\category::where('gender', 2)->orWhere('gender',0)->get();
?>

    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Male Categories
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <button onclick='window.history.go(-1);' class="list-group-item list-group-item-action bg-light"><- Spol</button>
  @foreach ($maleCategories as $maleCategory)
    <button onclick='location.href="/itemiKategorijeOpcenito/{{$itemiKategorije =  $maleCategory->gender}}"' class="dropdown-item" href="#">{{$maleCategory->name}}</button>
    @endforeach

  </div>
</div>

