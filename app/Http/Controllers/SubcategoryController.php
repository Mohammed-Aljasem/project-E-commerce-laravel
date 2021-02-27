<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
class SubcategoryController extends Controller
{
    public function index() {
        $subcategory = new Subcategory();
        $subcategories = $subcategory->all();
        $category = new Category();
        $categories = $category->all();
        return view('dashboard.subcategory', compact('subcategories','categories'));
    }

    public function create() {
        return view("dashboard.subcategory");
    }

    public function store(Request $req) {
        $subcategory = new Subcategory();
        $req->validate([
            'sub_name'      => 'required ',
            'sub_desc'      => 'required',
            'img'           => 'required | mimes:jpg, jpeg, png, jfif, jif, svg',
            'category_id'   => 'required',

        ]);
        $image = $req->file('img');
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);

        $subcategory->sub_name = $req['sub_name'];
        $subcategory->sub_desc = $req['sub_desc'];
        $subcategory->sub_img  = $imagename;
        $subcategory->category_id = $req['category_id'];

        $category = Category::find($req['category_id']);
        $category->subcategories()->save($subcategory);

        $subcategory->save();
        return  redirect('/admin/subcategory');
    }

    public function destroy($id) {
        $subcategory = new Subcategory();
        $subcategory->destroy($id);
        return redirect('/admin/subcategory');
    }

    public function edit($id) {
        $subcategoryModel = new Subcategory();
        $subcategory = $subcategoryModel->find($id);
        $category = new Category();
        $categories = $category->all();
        return view('dashboard.editsubcat', compact('subcategory','categories'));
    }

    public function update(Request $req, $id) {
        $subcategory = new Subcategory();
        $subcategory = $subcategory->find($id);
        if($req->hasFile('img')) {
            $image = $req->file('img');
            $imagename = time() . '.' . $image->extension();
            $image->move(public_path('/images'), $imagename);
        }
        $subcategory->sub_name    = $req['sub_name'];
        $subcategory->sub_desc    = $req['sub_desc'];
        $subcategory->sub_img     = $imagename;
        $subcategory->category_id = $req['category_id'];
        $subcategory->save();
        return redirect("/admin/subcategory");
    }
}
