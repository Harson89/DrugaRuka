<?php

namespace App\Http\Controllers;
use App\item;
use App\User;
use Illuminate\Support\Facades\Auth;
use Hash;

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

      //Funkcija za ispis editInfo page-a
      public function changePasswordPage()
      {
          return view('myProfile.editInfo');
      }
  
      //Funkcija za update licnih podataka
      public function changePassword(Request $request)
      {
          //PROVJERA DA LI JE UNIO SVE INFORMACIJE IZ FORME
          $this->validate($request,[
              'stariPassword' => 'required',
              'noviPassword' => 'required|min:6',
              'confirmPassword' => 'required|min:6'
          ]);
  
          // PROVJERA DA LI UNIO PRAVILNU STARU SIFRU
          if(!(Hash::check($request->get('stariPassword'),Auth::user()->password))) {
              return redirect()->back()->with("error", "Molim unesite tačnu trenutnu lozinku");
          }
  
            //PROVJERA DA LI JE NOVA SIFRA ISTA KAO STARA SIFRA
            if(strcmp($request->get('stariPassword'), $request->get('noviPassword')) == 0 ){
              return redirect()->back()->with("error", "Nova lozinka ne moze biti ista kao stara lozinka");
          }
  
           //PROVJERA DA LI JE PRAVILNO POTVRDNO UPISAO SIFRE
           if(($request->get('noviPassword')) != ($request->get('confirmPassword'))){
              return redirect()->back()->with("error","Pravilno upisite lozinke u polja novih lozinki");
          }
  
             // PROMJENA SIFRE 
             $user = Auth::user();
             $user->password = bcrypt($request->get('noviPassword'));
             $user->save();

             return redirect('/home');
  
      }

}
