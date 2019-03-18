<?php
$childCategories = App\category::where('gender', 4)->orWhere('gender',0)->get();
?>

    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Child Categories
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <button onclick='window.history.go(-1);' class="list-group-item list-group-item-action bg-light"><- Spol</button>
  @foreach ($childCategories as $childCategory)
    <button onclick='location.href="/itemiKategorijeOpcenito/{{$itemiKategorije = $childCategory->id}}"' class="dropdown-item" href="#">{{$childCategory->name}}</button>
    @endforeach

  </div>
</div>

