<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Author;
use App\Publisher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $req){

        $authors=Author::all();
        $publisher=Publisher::all();

        if($req->session()->has('logged')){
            return view('admin-dashboard')->with(['authors'=>$authors,'publisher'=>$publisher]);
        }else{
            return redirect('/admin/login');
        }
    }

    public function login(Request $req){

        $email=$req->get('email');
        $password=$req->get('password');

        $admin=Admin::find(1);
        $authors=Author::all();
        $publisher=Publisher::all();

        if($admin->email==$email&&$admin->password==$password){
            $req->session()->put('logged',$email);
            return view('admin-dashboard')->with(['authors'=>$authors,'publisher'=>$publisher]);
        }else{
            return view('admin-login');
        }
    }

    public function logout(Request $req){
        $req->session()->forget('logged');
        return redirect('/');
    }
}
