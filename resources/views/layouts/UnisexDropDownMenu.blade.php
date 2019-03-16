<?php
$unisexCategories = App\category::where('gender', 1)->orWhere('gender',0)->get();
?>

    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Unisex Categories
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

  @foreach ($unisexCategories as $unisexCategory)
    <a class="dropdown-item" href="#">{{$unisexCategory->name}}</a>
    @endforeach

  </div>
</div>

