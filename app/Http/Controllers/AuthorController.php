<?php

namespace App\Http\Controllers;

use App\Optional\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){

    }

    public function add(Request $req){

        $name=$req->get('name');
        $email=$req->get('email');

        $authorService=new AuthorService();
        $authorService->add($name,$email);

        return redirect('/admin');
    }

    public function update(Request $req, $id){

        $name=$req->get('name');
        $email=$req->get('email');

        $authorService=new AuthorService();
        $authorService->update($id,$name,$email);

        return redirect('/admin');

    }

    public function delete(Request $req, $id){

        $authorService=new AuthorService();
        $authorService->delete($id);

        return redirect('/admin');

    }
}
