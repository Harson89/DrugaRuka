<?php

namespace App\Http\Controllers;
use App\item;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $items = item::all();

        return view('home')->with('items',$items);
    }

     //Funkcija za ispis itema po kategoriji za sve
     public function itemiPoKategoriji($itemiKategorije)
     {
         $items = item::where('gender' , $itemiKategorije)->get();


         return view ('itemiKategorijeOpcenito')->with('items',$items)->with('itemiKategorije' , $itemiKategorije);
     }
 }
