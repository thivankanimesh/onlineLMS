<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){

    }

    public function add(Request $req){

        $publisher=new Publisher;

        $name=$req->name;
        $email=$req->email;

        $publisher->name=$name;
        $publisher->email=$email;

        $publisher->save();

        return redirect('/admin');
    }

    public function update(Request $req, $id){

        $publisher = Publisher::find($id);

        $name=$req->name;
        $email=$req->email;

        $publisher->name=$name;
        $publisher->email=$email;

        $publisher->save();

        return redirect('/admin');

    }

    public function delete(Request $req, $id){

        $publisher = Publisher::find($id);

        $publisher::where('publisherId',$id)->delete();

        return redirect('/admin');

    }
}
