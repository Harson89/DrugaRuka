<?php

namespace App\Http\Controllers;
use App\item;
use Illuminate\Support\Facades\Input;

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
        $item->category_id = $request->input('category_id');
        $item->name = $request->input('itemName');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->gender = $request->input('gender');
        $item->picture = $request->file('file')->getClientOriginalName();

        //stavi sliku u folder
        if(Input::hasFile('file')){

			$file = Input::file('file');
			$file->move('images', $file->getClientOriginalName());
		}




        $item->save();
        return redirect()->back()->with('successMessage','Item has been successfully added');

    }

}
