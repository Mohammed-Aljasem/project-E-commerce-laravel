<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
   

   public function index(){
    if(Auth::user() == null){
        
       return redirect('login');

    }else{
       $order = Order::where('user_id' , Auth::user()->id) -> get() ;
       
        
        return view('home' , compact('order') );
    }
   }
}
