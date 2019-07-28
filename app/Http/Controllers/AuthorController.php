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

    public function update(Request $req, $id){

        $author=Author::find($id);

        $name=$req->get('name');
        $email=$req->get('email');

        error_log($author->name.$author->email);

        $author->name=$name;
        $author->email=$email;

        error_log('Some message here.'.$id.$name.$email);

        $author->save();

        return redirect('/admin');

    }

    public function delete(Request $req, $id){

        $author=Author::find($id);

        $author::where('authorId',$id)->delete();

        return redirect('/admin');

    }
}
