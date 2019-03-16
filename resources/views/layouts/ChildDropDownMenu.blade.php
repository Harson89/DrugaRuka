<?php
$childCategories = App\category::where('gender', 4)->orWhere('gender',0)->get();
?>

    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Child Categories
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

  @foreach ($childCategories as $childCategory)
    <a class="dropdown-item" href="#">{{$childCategory->name}}</a>
    @endforeach

  </div>
</div>

