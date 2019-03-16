<?php

namespace App\Http\Controllers;
use App\item;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function showById($item_id){

        //$jokes = jokes::where('category_id',$category_id)->get();

        $product = item::find($item_id);

        return view('products.productById')->with('product',$product);
    }



}
