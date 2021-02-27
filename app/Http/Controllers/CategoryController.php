<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category   = new Category();
        $categories = $category->all();
        return view("dashboard.category", compact('categories'));
    }

    public function create() {
        return view("dashboard.category");
    }

    public function store(Request $req) {
        // cat_name	cat_desc	cat_img
        $category = new Category();
        $req->validate([
            'cat_name'   => 'required',
            'cat_desc'   => 'required',
            
        ]);
        
        $image = $req->file('file');
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('/images'), $imagename);

        $category->cat_name   = $req['cat_name'];
        $category->cat_desc   = $req['cat_desc'];
        $category->cat_img    = $imagename;
        $category->save();
        return  redirect('/admin/category');
    }


    public function destroy($id) {
        $category = new Category();
        $category->destroy($id);
        return redirect('/admin/category');
    }

    public function edit($id) {
        $categoryModel = new Category();
        $category = $categoryModel->find($id);
        return view('dashboard.editcategory', compact('category'));
    }

    public function update(Request $req, $id) {
        $category = new Category();
        $category = $category->find($id);
        if($req->hasFile('file')) {
            $image = $req->file('file');
            $imagename = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imagename);
            $category->cat_img    = $imagename;
        }
        $category->cat_name   = $req['cat_name'];
        $category->cat_desc   = $req['cat_desc'];
        $category->save();
        return redirect("/admin/category");
    }
}
