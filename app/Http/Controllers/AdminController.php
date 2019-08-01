<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Optional\AdminService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function index(Request $req){

        $adminService=new AdminService();
        $viewArrays=$adminService->init();

        if($req->session()->has('logged')){

            return view('admin-dashboard')->with($viewArrays);

        }else{
            return redirect('/admin/login');
        }
    }

    public function login(Request $req){

        $email=$req->get('email');
        $password=$req->get('password');

        // Getting first admin's details for login
        $admin=Admin::find(1);

        $adminService=new AdminService();
        $viewArrays=$adminService->init();

        if($admin->email==$email&&$admin->password==$password){
            $req->session()->put('logged',$email);
            return view('admin-dashboard')->with($viewArrays);
        }else{
            return view('admin-login');
        }
    }

    public function logout(Request $req){

        $req->session()->forget('logged');

        return redirect('/');
    }
}
