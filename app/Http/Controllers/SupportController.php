<?php

namespace App\Http\Controllers;
use App\User;
use App\support;


use Illuminate\Http\Request;

class SupportController extends Controller
{

public function posaljiPoruku(Request $request)
{

    $supportMessage = new support;
            
            $supportMessage->firstName = "Default";
            $supportMessage->lastName = "Default";
            $supportMessage->user_id = 1;

            $supportMessage->message = $request->input('sadrzajPoruke');
            $supportMessage->email =   $request->input('mailUsera');
            $supportMessage->save();

            return view ('myProfile.home');

}    
}
