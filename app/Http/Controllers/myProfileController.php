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

        //kolicina velicina
        $item->XXXLQuantity = $request->input('quantityXXXL');
        $item->XXLQuantity = $request->input('quantityXXL');
        $item->XLQuantity = $request->input('quantityXL');
        $item->LQuantity = $request->input('quantityL');
        $item->MQuantity = $request->input('quantityM');
        $item->SQuantity = $request->input('quantityS');
        $item->XSQuantity = $request->input('quantityXS');


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

      //Funkcija za update passworda
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

      //Funkcija za ispis editEmail page-a
      public function changeEmailPage()
      {
          return view('myProfile.editEmail');
      }


      //Funkcija za promjenu maila
      public function changeEmail(Request $request)
      {
          //PROVJERA DA LI JE UNIO SVE INFORMACIJE IZ FORME
          $this->validate($request,[
              'noviMail' => 'required',
              'confirmMail' => 'required'
          ]);

          $stariMail = Auth::User()->email;

            //PROVJERA DA LI JE NOVI MAIL ISTI KAO PREDHODNI
            if(strcmp($request->get($stariMail), $request->get('noviMail')) == 0 ){
                return redirect()->back()->with("error", "Unijeli ste stari mail");
            }

            //PROVJERA DA LI JE PRAVILNO POTVRDNO UPISAO MAILOVE
            if(($request->get('noviMail')) != ($request->get('confirmMail'))){
                return redirect()->back()->with("error","Pravilno upisite mailove u polja novih mailova");
            }

            // PROMJENA MAILA
            $user = Auth::user();
            $user->email = ($request->get('noviMail'));
            $user->save();

            return redirect('/home');

      }


}
