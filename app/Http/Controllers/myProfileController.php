<?php

namespace App\Http\Controllers;
use App\item;
use App\User;
use Illuminate\Support\Facades\Auth;
use Hash;


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
        $item->picture = 'https://scontent.flju1-1.fna.fbcdn.net/v/t1.0-9/33943750_893129320863326_3788903819341987840_n.jpg?_nc_cat=105&_nc_ht=scontent.flju1-1.fna&oh=a0ce3a024763cc632e19cf5694dd3d05&oe=5D0B5CA1';
        $item->name = $request->input('itemName');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->gender = $request->input('gender');

        $item->save();

        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
          ]);
          if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/galeryImages/');
            $image->move($destinationPath, $name);
            $this->save();
            return back()->with('success','Image Upload successfully');
          }

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
