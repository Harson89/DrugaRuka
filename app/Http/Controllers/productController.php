<?php

namespace App\Http\Controllers;
use App\item;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function showById($item_id){


        $product = item::find($item_id);

        return view('products.productById')->with('product',$product);
    }



}
