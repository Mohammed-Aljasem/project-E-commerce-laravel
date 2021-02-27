<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ;

class singelproductController extends Controller
{
   function index($id){

    $Product =  Product::find($id)  ;
    return view('singel-product' , compact('Product'));
       
   }
}
