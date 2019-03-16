<?php

namespace App\Http\Controllers;
use App\item;

use Illuminate\Http\Request;

class myProfileController extends Controller
{
    public function index(){
        return view('myProfile.home');
    }

    public function addItem(){
        return view('myProfile.addItem');
    }

    public function addItemExecute(Request $request){
        $item = new item;
        $item->category_id = 1;
        $item->picture = 'https://scontent.flju1-1.fna.fbcdn.net/v/t1.0-9/33943750_893129320863326_3788903819341987840_n.jpg?_nc_cat=105&_nc_ht=scontent.flju1-1.fna&oh=a0ce3a024763cc632e19cf5694dd3d05&oe=5D0B5CA1';
        $item->name = $request->input('itemName');
        $item->description = $request->input('description');
        $item->price = $request->input('price');

        $item->save();

        return redirect()->back()->with('successMessage','Item has been successfully added');

    }

}
