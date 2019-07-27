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
        $category=$req->get('category');
        $author=$req->get('author');
        $publisher=$req->get('publisher');
        $price=$req->get('price');
        $coverpic=$req->file('coverpic');
        $pdf=$req->file('pdf');

        $coverpicName='coverpic'.time().'.jpg';
        $pdfName='pdf'.time().'.pdf';

        $coverpic->storeAs('coverpics',$coverpicName,'public');
        $pdf->storeAs('pdfs',$pdfName);

        $ebook->title=$title;
        $ebook->desc=$description;
        $ebook->category=$category;
        $ebook->author=$author;
        $ebook->publisher=$publisher;
        $ebook->price=$price;
        $ebook->coverpic=$coverpicName;
        $ebook->pdf=$pdfName;

        $ebook->save();

        return redirect('/admin');

    }

    public function update(Request $req,$id){
        $ebook=Ebook::find($id);

        $title=$req->get('title');
        $description=$req->get('description');
        $category=$req->get('category');
        $author=$req->get('author');
        $publisher=$req->get('publisher');
        $price=$req->get('price');
        $coverpic=$req->file('coverpic');
        $pdf=$req->file('pdf');

        $coverpicName='coverpic'.time().'.jpg';
        $pdfName='pdf'.time().'.pdf';

        $coverpic->storeAs('coverpics',$coverpicName,'public');
        $pdf->storeAs('pdfs',$pdfName);

        $ebook->title=$title;
        $ebook->desc=$description;
        $ebook->category=$category;
        $ebook->author=$author;
        $ebook->publisher=$publisher;
        $ebook->price=$price;
        $ebook->coverpic=$coverpicName;
        $ebook->pdf=$pdfName;

        $ebook->save();

        return redirect('/admin');
    }

    public function delete(Request $req){

    }
}
