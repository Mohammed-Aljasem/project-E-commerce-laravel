<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory ;
use App\Category ;
use App\Product;
use App\subcatproduct;

class SubCatController extends Controller
{
   function Fetch($id){

    $category = new Category();
    $category = $category::find($id) ;

    $sub_cats = new Subcategory() ;
    $sub_cats = $sub_cats::where('category_id' , $id) -> get() ;

    return view('subCategoreis' , ['sub_cats'=>$sub_cats , 'bg' => $category -> cat_img] ) ;

   }
   function FetchProducts($id){

    $subcat = new Subcategory();
    $subcat= $subcat::find($id)-> first() ;


    $products = new Product() ;
    $products = $products::where('subcategory_id' , $id) -> get() ;
    
   return view ('products', ["products" => $products, "subcat" => $subcat]);

   }
   function FetchCategories(){

      

      // $products =Product::all();
      $subcat =Subcategory::all();
     
      return view("categories",compact('subcat'));

   }
   

   
}
