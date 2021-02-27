<?php

namespace App\Http\Controllers;

use App\Order;
use App\orders_product;
use Illuminate\Http\Request;
use App\Product ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session ;

class cartController extends Controller
{
    function add($id ,$qty){

        $Product = Product::find($id);
        
        $Product ->qty = $qty ;
        Session::push('cart.teams', $Product);
        return $Product ;

       


    }
    public function delete($key)

    {
        // Session::get('cart.items')[$key] = null ;
        // Session::get('cart.teams')[$key] = null ;
        // Session::forget(Session::get('cart.teams')[$key]) ;
        $products = Session::get('cart.teams'); // Second argument is a default value
        
            unset($products[$key]);
      
        Session::put('cart.teams', $products);
     

        # code...
    }
    public function Checkout()
    {
        if(Auth::user()){
            $total_cart = 0 ;
        foreach(Session::get('cart.teams') as $product){
            $total_cart += ($product -> pro_price - ($product -> pro_discount * $product -> pro_price) /100 ) * $product -> qty;

            
        }
        $order = new Order();
        $order -> total_price = $total_cart ;
        $order -> user_id = Auth::user()->id ;
        $order -> save();

        foreach(Session::get('cart.teams') as $product){

            
            $orderProduct = new orders_product();
            $orderProduct -> quantity = $product -> qty ;
            $orderProduct -> quantity = $product -> qty ;
            $orderProduct -> order_details = $product -> pro_name ;
            $orderProduct -> product_id = $product -> id ;
            $orderProduct -> order_id = $order -> id ;
            $orderProduct -> single_price = ($product -> pro_price - ($product -> pro_discount * $product -> pro_price) /100 ) ;
            $orderProduct -> save();
        }

        Session::forget('cart.teams');
        return redirect('profile') ;

        }else{
            return redirect('login') ;
        }


        


        
    }
}
