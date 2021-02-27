<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ;

class addController extends Controller
{

    public function index(){

        $pro = new Product();
        $pro -> pro_name = 'test name' ;
        $pro -> pro_price = 20 ;
        $pro -> pro_primary_img = 'test img' ;
        $pro -> pro_desc = 'test desc' ;
        $pro -> pro_discount = 10;
        $pro -> save() ;
        
    }
        
}
