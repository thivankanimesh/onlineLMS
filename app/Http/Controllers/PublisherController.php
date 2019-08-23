<?php

namespace App\Http\Controllers;

use App\Optional\PublisherService;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){

    }

    public function add(Request $req){

        $name=$req->name;
        $email=$req->email;

        $publisherService=new PublisherService();
        $publisherService->add($name,$email);

        return redirect('/admin');
    }

    public function update(Request $req, $id){

        $name=$req->name;
        $email=$req->email;

        $publisherService=new PublisherService();
        $publisherService->update($id,$name,$email);

        return redirect('/admin');

    }

    public function delete(Request $req, $id){

        $publisherService=new PublisherService();
        $publisherService->delete($id);

        return redirect('/admin');

    }

    public function search(Request $req){

        $query=$req->get('query');

        $publisherService=new PublisherService();
        $publishers=$publisherService->search($query);

        if($req->ajax){
            return response()->json(['success'=>'Data searched successfully']);
        }

        return view('results')->with(['publishers'=>$publishers,'fromPublisherSearch'=>"fromPublisherSearch"]);
    }
}
