<?php

namespace App\Http\Controllers;
use App\item;
use App\User;
use App\category;
use App\order;
use App\orders_item;


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

  //Funkcija za brisanje itema -- Tacnije setuje sve velicine na nulu kako se ne bi moglo prikazati
  public function izbrisiItem($zaIzbrisati)
  {
   $izbrisiOvaj = item::find($zaIzbrisati);
   $izbrisiOvaj->XXXLQuantity = 0;
   $izbrisiOvaj->XXLQuantity = 0;
   $izbrisiOvaj->XLQuantity = 0;
   $izbrisiOvaj->LQuantity = 0;
   $izbrisiOvaj->MQuantity = 0;
   $izbrisiOvaj->SQuantity = 0;
   $izbrisiOvaj->XSQuantity = 0;
   $izbrisiOvaj->save();
   return view('owner.ownerPage');
  }

  //funckija za ispis narudzbi koje se trebaju poslati
  public function displayOrders(){


        //povuc sve narudzbe koje su placene
        $orders = order::where([
            'finished'=>0,
            'shipped' => 'no'
        ])->get();

        //provjeriti da li uopste postoje narudzbe
        if(count($orders)==0){
            return view('owner.shipItems')->with('message','No orders ready for shipping yet');
        } else {
            return view('owner.shipItems')->with('orders',$orders);
        }
  }


  //funkcija za Shipovanje ordera
  public function shipItemsExecute(Request $request){

    $orderID = $request->input('orderID');

    //change to SHIPPED = YES
    $order = order::find($orderID);
    $order->shipped = 'yes';
    $order->save();

    //izbrisat iteme sa skladista
        //pronac order items
        $orderItems = orders_item::where('order_id',$orderID)->get();


        //po item_id iz order_items pobrisat iteme sa skladista koji su kupljeni
        foreach($orderItems as $orderItem){

            //dobit vrijednosti koliko ih je naruceno
            $XXXL = $orderItem->quantityXXXL;
            $XXL = $orderItem->quantityXXL;
            $XL = $orderItem->quantityXL;
            $L = $orderItem->quantityL;
            $M = $orderItem->quantityM;
            $S = $orderItem->quantityS;
            $XS = $orderItem->quantityXS;


            // pronac item i oduzet mu kolicinu
            $item = item::find($orderItem->item_id);
            $item->XXXLQuantity -= $XXXL;
            $item->XXLQuantity -= $XXL;
            $item->XLQuantity -= $XL;
            $item->LQuantity -= $L;
            $item->MQuantity -= $M;
            $item->SQuantity -= $S;
            $item->XSQuantity -= $XS;
            $item->save();
        }

        return redirect()->back()->with('message','Shipping Confirmed');


  }


}
