<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\order;
use App\orders_item;
use Auth;

class cartController extends Controller
{
    //ispis osnovnih podataka iz korpe
    public function index(){

        //get id from order from logged USER wich is not finished
        $orders = order::where([
            'finished' => 1,
            'user_id' => Auth::id(),
        ])->get();

        // ako postoji order koji je cart
        if(!$orders->isEmpty()){

            foreach($orders as $order){
                $orderID = $order->id;
            }

            //dobit order items tabelu
            $orderItems = orders_item::where('order_id',$orderID)->get();


            return view('cart.myCart')->with('orderItems',$orderItems);
        } else {
            return view('cart.myCart')->with('message', 'No items in your cart yet');
        }


    }

    //redirect na checkout page
    public function buyAll(){
        return view('cart.checkout');
    }

    //make order function
    public function buyAllExecute(Request $request){

        //pronac order koji je cart
        $order = order::where([
            'finished' => 1,
            'user_id' => Auth::id(),
        ])->first();

        //poslano
        $order->shipped = 'no';
        $order->firstName = $request->input('firstName');
        $order->lastName = $request->input('lastName');
        $order->finished = 0;
        $order->zip = $request->input('zip');
        $order->city = $request->input('city');
        $order->address = $request->input('address');

        $order->save();

        return view('cart.myCart')->with('message','Your order will be shipped towards your adress in few days');


        //treba dodat broj telefona

    }

    //remove item
    public function removeItem(Request $request){

        $order_item = orders_item::where('item_id',$request->input('item_id'));
        $order_item->delete();
        return redirect()->back();
    }

}
