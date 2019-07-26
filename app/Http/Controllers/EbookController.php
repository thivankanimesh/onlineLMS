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

        $coverpicName='coverpic'.time().'.jpg';
        $pdfName='pdf'.time().'.pdf';

        $coverpic->storeAs('coverpics',$coverpicName,'public');
        $pdf->storeAs('pdfs',$pdfName);

        $ebook->title=$title;
        $ebook->desc=$description;
        $ebook->price=$price;
        $ebook->coverpic=$coverpicName;
        $ebook->pdf=$pdfName;

        $ebook->save();

        return redirect('/admin');

    }

    public function modify(Request $req){

    }

    public function delete(Request $req){

    }
}
