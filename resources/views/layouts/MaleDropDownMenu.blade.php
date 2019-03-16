<?php
$maleCategories = App\category::where('gender', 2)->orWhere('gender',0)->get();
?>

    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Male Categories
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

  @foreach ($maleCategories as $maleCategory)
    <a class="dropdown-item" href="#">{{$maleCategory->name}}</a>
    @endforeach

  </div>
</div>

