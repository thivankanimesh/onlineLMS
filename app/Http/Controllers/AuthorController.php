<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){

    }

    public function add(Request $req){

        $author=new Author();

        $name=$req->get('name');
        $email=$req->get('email');

        $author->name=$name;
        $author->email=$email;

        $author->save();

        return redirect('/admin');
    }

    public function modify(){

    }

    public function delete(){

    }
}
