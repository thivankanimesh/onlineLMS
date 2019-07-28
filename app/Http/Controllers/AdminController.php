<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Author;
use App\Publisher;
use App\Ebook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function index(Request $req){

        $authors=Author::all();
        $publishers=Publisher::all();
        $ebooks=Ebook::orderBy('eid','desc')->get();

        if($req->session()->has('logged')){

            return view('admin-dashboard')->with(['authors'=>$authors,'publishers'=>$publishers,'ebooks'=>$ebooks]);

        }else{
            return redirect('/admin/login');
        }
    }

    public function login(Request $req){

        $email=$req->get('email');
        $password=$req->get('password');

        $admin=Admin::find(1);
        $authors=Author::all();
        $publishers=Publisher::all();
        $ebooks=Ebook::paginate(2);

        if($admin->email==$email&&$admin->password==$password){
            $req->session()->put('logged',$email);
            return view('admin-dashboard')->with(['authors'=>$authors,'publisher'=>$publishers,'ebooks'=>$ebooks]);
        }else{
            return view('admin-login');
        }
    }

    public function logout(Request $req){
        $req->session()->forget('logged');
        return redirect('/');
    }
}
