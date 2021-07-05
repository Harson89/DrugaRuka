<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenderController extends Controller
{

//Za ispis female page
public function female()
{
    return view('Gender.female');
}

    //Za ispis male page
public function male()
{
    return view('Gender.male');
}


    //Za ispis child page
public function child()
{
    return view('Gender.child');
}

  //Za ispis unisex page
  public function unisex()
  {
      return view('Gender.unisex');
  }
}
