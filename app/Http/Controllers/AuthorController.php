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

        if($req->ajax()){
            return response()->json(['success'=>'Data added successfully']);
        }

        return redirect('/admin');
    }

    public function update(Request $req, $id){

        $name=$req->get('name');
        $email=$req->get('email');

        $authorService=new AuthorService();
        $authorService->update($id,$name,$email);

        if($req->ajax()){
            return response()->json(['success'=>'Data updated successfully']);
        }

        return redirect('/admin');

    }

    public function delete(Request $req, $id){

        $authorService=new AuthorService();
        $authorService->delete($id);

        if($req->ajax()){
            return response()->json(['success'=>'Data deleted successfully']);
        }

        return redirect('/admin');

    }

    public function search(Request $req){

        $query=$req->get('query');

        $authorService=new AuthorService();
        $authors=$authorService->search($query);

        if($req->ajax){
            return response()->jason(['success'=>'Data searched successfully']);
        }

        return view('results')->with(['authors'=>$authors,'fromAuthorSearch'=>"fromAuthorSearch"]);
    }
}
