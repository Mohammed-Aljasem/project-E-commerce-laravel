<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category ;
use App\Subcategory ;
use App\ProductImages;

class productController extends Controller
{
    function index(){

        $product = new Product();
        $products = $product->all();
        return view("products", compact('products'));
    }

    function indexAdmin(){
        
        $product = new Product();
        $products = $product->all();
        $subcategory = new Subcategory();
        $subcategories = $subcategory->all();
        return view("dashboard.product", compact('products', 'subcategories'));
    }

    function homeFetch(){

        $products =Product::all();
        $categories =Category::all();
        return view("index",["products" => $products, "categories" => $categories]);
    }

    public function create()
    {
        return view("dashboard.product");
    }

    // {{-- pro_name | pro_price | pro_primary_img | pro_desc | subcategory_id	| pro_discount --}}
    public function store(Request $req)
    {
        $req->validate([
            'pro_name'       => 'required',
            'pro_price'      => 'required',
            'file'           => 'mimes:jpg, jpeg, png, jfif, svg',
            'pro_desc'       => 'required',
            'pro_discount'   => 'required',
            'subcategory_id' => 'required',
        ]);

        $image = $req->file('file');
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);

        $product = new Product();
        $product->pro_name        = $req['pro_name'];
        $product->pro_price       = $req['pro_price'];
        $product->pro_primary_img = $imagename;
        $product->pro_desc        = $req['pro_desc'];
        $product->pro_discount    = $req['pro_discount'];
        $product->subcategory_id  = $req['subcategory_id'];

        $subcategory = Subcategory::find($req['subcategory_id']);
        $subcategory->products()->save($product);
        $product->save();
        $data = [];
        
        $images = $req->file('images') ;
        foreach ($images as $k => $product_image_value) {
            $product_image = new ProductImages();
            $pro_img_path = time() . $k . '.' . $product_image_value -> getClientOriginalExtension() ;
            $product_image_value->move(public_path('/images')  , $pro_img_path );
            $product_image->pro_images = $pro_img_path;
           
            // $image->move(public_path('images'), $img);
            $data[] = $product_image;
        }
        $product->images()->saveMany($data);
        return redirect('/admin/product');
    }

    public function destroy($id) {
        $product = new Product();
        $product->destroy($id);
        return redirect('/admin/product');
    }

    public function edit($id) {
        $productModel = new Product();
        $product = $productModel->find($id);
        $subcategory = new Subcategory();
        $subcategories = $subcategory->all();
        return view('dashboard.editproduct', compact('product', 'subcategories'));
    }

    public function update(Request $req, $id) {
        $product = new Product();
        $product = $product->find($id);
        if($req->hasFile('file')) {
            $image = $req->file('file');
            $pimage = time() . '.' . $image->extension();
            $image->move(public_path('images'), $pimage);
            $product->pro_primary_img = $pimage;
        }
        $product->pro_name        = $req['pro_name'];
        $product->pro_price       = $req['pro_price'];
        $product->pro_desc        = $req['pro_desc'];
        $product->pro_discount    = $req['pro_discount'];
        $product->subcategory_id  = $req['subcategory_id'];
        $product->save();
        return redirect("/admin/product");
    }
}
