<?php

namespace App\Http\Controllers;
use App\item;
use App\order;
use DB;
use Auth;
use App\orders_item;
use Session;

use Illuminate\Http\Request;

class productController extends Controller
{


    public function showById($item_id){


        $product = item::find($item_id);

        return view('products.productById')->with('product',$product);
    }

    public function addToCart(Request $request){

        //$users = DB::table('users')->count();

        // da li je user prijavljen

        if($user = Auth::user()){

        //DA LI POSTOJI ORDER KOJI NIJE ZAVRSEN
        $orderCount = DB::table('orders')->where([
            'user_id' => Auth::id(),
            'finished' => 1,
        ])->count();

        if($orderCount == 0) {
            // make order & add to orders_items

            //make order with temp info
            $order = new order;
            $order->finished = 1;
            $order->address = 'test';
            $order->city = 'test';
            $order->zip = 1;
            $order->price = 0;
            $order->user_id = Auth::id();
            $order->firstName= '';
            $order->lastName= '';
            $order->save();

        }

        //povuc order ID koji je zapravo CART
        $orderIDS = order::where([
            'finished' => 1,
            'user_id' => Auth::id(),
        ])->get();

        foreach($orderIDS as $oderID){
            $orderID = $oderID->id;
        }

        $narudzba = order::find($orderID);

        //pokupit podatke sa forme
        $product_id = $request->input('product_id');
        $productSize = $request->input('size');
        $productQuantity = $request->input('quantity');

        $orders_item = new orders_item;
        $orders_item->item_id = $product_id;
        $orders_item->order_id = $orderID;

        //naruceni ITEM
        $artikal = item::find($product_id);


        //ovo dole sto se desava treba da se desava na kraju kad coek plati hvala sjebo sam se spava mi se pravo


        //ubacit kolicinu u velicinu koja je odabrana i update items atribut (skinut te produkta)
        if($productSize == 1){

            //da li ima dovoljno artikala te velicine
            if($artikal->XXXLQuantity >= $productQuantity){

                //povecat sveukupnu cijenu ordera
                $narudzba->price += ($artikal->price)*$productQuantity;
                $narudzba->save();


                //dodaje u korpu kolicinu itema koji su naruceni
                $orders_item->quantityXXXL = $productQuantity;


                //poruka da je item dodan u korpu
                $message= 'You successfully added item to your cart';

                $orders_item->save();
            } else {
                $message= "Sorry, we don't have that amount of that product";
            }

        } else if ($productSize == 2){

            //da li ima dovoljno artikala te velicine
            if($artikal->XXLQuantity >= $productQuantity){

                //dodaje u korpu kolicinu itema koji su naruceni
                $orders_item->quantityXXL = $productQuantity;


                //poruka da je item dodan u korpu
                $message= 'You successfully added item to your cart';

                $orders_item->save();
            } else {
                $message= "Sorry, we don't have that amount of that product";
            }

        } else if ($productSize == 3){

            //da li ima dovoljno artikala te velicine
            if($artikal->XLQuantity >= $productQuantity){

                //dodaje u korpu kolicinu itema koji su naruceni
                $orders_item->quantityXL = $productQuantity;


                //poruka da je item dodan u korpu
                $message= 'You successfully added item to your cart';

                $orders_item->save();
            } else {
                $message= "Sorry, we don't have that amount of that product";
            }


        } else if ($productSize == 4){

            //da li ima dovoljno artikala te velicine
            if($artikal->LQuantity >= $productQuantity){

                //dodaje u korpu kolicinu itema koji su naruceni
                $orders_item->quantityL = $productQuantity;


                //poruka da je item dodan u korpu
                $message= 'You successfully added item to your cart';

                $orders_item->save();
            } else {
                $message= "Sorry, we don't have that amount of that product";
            }

        } else if ($productSize == 5){

            //da li ima dovoljno artikala te velicine
            if($artikal->MQuantity >= $productQuantity){

                //dodaje u korpu kolicinu itema koji su naruceni
                $orders_item->quantityM = $productQuantity;


                //poruka da je item dodan u korpu
                $message= 'You successfully added item to your cart';

                $orders_item->save();
            } else {
                $message= "Sorry, we don't have that amount of that product";
            }

        } else if ($productSize == 6){

            //da li ima dovoljno artikala te velicine
            if($artikal->SQuantity >= $productQuantity){

                //dodaje u korpu kolicinu itema koji su naruceni
                $orders_item->quantityS = $productQuantity;


                //poruka da je item dodan u korpu
                $message= 'You successfully added item to your cart';

                $orders_item->save();
            } else {
                $message= "Sorry, we don't have that amount of that product";
            }

        } else if ($productSize == 7){

            //da li ima dovoljno artikala te velicine
            if($artikal->XSQuantity >= $productQuantity){

                //dodaje u korpu kolicinu itema koji su naruceni
                $orders_item->quantityXS = $productQuantity;


                //poruka da je item dodan u korpu
                $message= 'You successfully added item to your cart';

                $orders_item->save();
            } else {
                $message= "Sorry, we don't have that amount of that product";
            }

        }

        //povecat sveukupnu cijenu


    } else {
        $message= "You must be registered to add items to cart";
    }



        return redirect()->back()->with('successMessage',$message);

    }



}
