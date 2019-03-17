<?php

namespace App\Http\Controllers;
use App\item;
use App\User;
use App\category;
use App\order;


use Illuminate\Http\Request;

class ownerController extends Controller
{

    //Funkcija za prikaz ownerPage-a
    public function prikazOwnerPage(){
           return view ('owner.ownerPage');
    }

    //Funkcija za prikaz kategorijeOwner-a
    public function prikazKategorijeOwner($idKategorije){
        
    return view('owner.kategorijeOwner')->with('idKategorije', $idKategorije);

 }

 //Funkcija za prikaz kategorijeOwner-a
 public function prikazItemaKategorije($imeTrenutneKategorije){
        
    return view('owner.itemiKategorije')->with('idTrenutnePodkategorije', $imeTrenutneKategorije);

 }

  //Funkcija za brisanje itema 
  public function izbrisiItem($item)
  {
   $izbrisiOvaj = item::findOrFail($item);
   $izbrisiOvaj->delete();
   return view('owner.ownerPage');
  }

}
