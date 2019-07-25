<?php

namespace App\Http\Controllers;

use App\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index(){

    }

    public function add(Request $req){

        $ebook=new Ebook();

        $title=$req->get('title');
        $description=$req->get('description');
        $price=$req->get('price');
        $coverpic=$req->file('coverpic');
        $pdf=$req->file('pdf');

        $coverpic->storeAs('coverpics','coverpic'.time().'.jpg');
        $pdf->storeAs('pdfs','pdf'.time().'.pdf');

        $ebook->title=$title;
        $ebook->desc=$description;
        $ebook->price=$price;
        $ebook->coverpic=$req->file('coverpic')->getClientOriginalName();
        $ebook->pdf=$req->file('pdf')->getClientOriginalName();

        $ebook->save();

        return redirect('/admin');

    }

    public function modify(Request $req){

    }

    public function delete(Request $req){

    }
}
