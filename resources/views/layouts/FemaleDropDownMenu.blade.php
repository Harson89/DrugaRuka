<?php
$femaleCategories = App\category::where('gender', 3)->orWhere('gender',0)->get();
?>

    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Female Categories
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

  @foreach ($femaleCategories as $femaleCategory)
    <a class="dropdown-item" href="#">{{$femaleCategory->name}}</a>
    @endforeach

  </div>
</div>

