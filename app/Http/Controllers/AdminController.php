<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash ;


class AdminController extends Controller
{

  
   public function __construct()
   {
       $this->middleware('auth:admin');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function indexLogin()
   {
    $admin  = new Admin();
    $admins = $admin->all();
    return view("dashboard.admin", compact('admins'));
   }

    public function index() {
        $admin  = new Admin();
        $admins = $admin->all();
        return view("dashboard.admin", compact('admins'));
    }

    public function create() {
        return view("dashboard.admin");
    }

    public function store(Request $req) {
        $req->validate([
            'admin_name' => 'required',
            'admin_email'    => 'required | email',
            'admin_password' => 'required | min:8 | max:16',
        ]);
        $admin = new Admin();
        $admin->name     = $req['admin_name'];
        $admin->email    = $req['admin_email'];
        $admin->password = Hash::make($req['admin_password']);
        $admin->save();
        return redirect('/admin');
    }
 

    public function destroy($id) {
        $admin = new Admin();
        $admin->destroy($id);
        return redirect('/admin');
    }

    public function edit($id) {
        $adminModel = new Admin();
        $admin = $adminModel->find($id);
        return view('dashboard.editadmin', compact('admin'));
    }

    public function update(Request $req, $id) {
        $admin = new Admin();
        $admin = $admin->find($id);
        $admin->name     = $req['admin_name'];
        $admin->email    = $req['admin_email'];
        if(!empty($req['admin_password'])){

            $admin->password = Hash::make( $req['admin_password']);
        }
        $admin->save();
        return redirect("/admin");
    }
}
