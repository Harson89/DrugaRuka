<?php
$femaleCategories = App\category::where('gender', 3)->orWhere('gender',0)->get();
?>

    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Female Categories
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <button onclick='window.history.go(-1);' class="list-group-item list-group-item-action bg-light"><- Spol</button>
  @foreach ($femaleCategories as $femaleCategory)
    <button onclick='location.href="/itemiKategorijeOpcenito/{{$itemiKategorije = $femaleCategory->gender}}"' class="dropdown-item" href="#">{{$femaleCategory->name}}</button>
    @endforeach

  </div>
</div>
