<?php

namespace App\Optional;

use DB;
use Auth;
use App\Ebook;
use App\Author;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class EbookService{

    public function __construct(){

    }

    public function addEbook($title,$description,$category,$author,$publisher,$price,$coverpic,$pdf){

        $ebook=new Ebook();

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
    }

    public function updateEbook($id,$title,$description,$category,$author,$publisher,$price,$coverpic,$pdf){

        $ebook=Ebook::find($id);

        // Creating coverpic name and pdf name
        $coverpicName='coverpic'.time().'.jpg';
        $pdfName='pdf'.time().'.pdf';

        // delete previous file
        Storage::disk('public')->delete('coverpics/'.$ebook->coverpic);
        Storage::delete('pdfs/'.$ebook->pdf);

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
    }

    public function deleteEbook($id){

        $ebook=Ebook::find($id);

        Storage::delete('pdfs/'.$ebook->pdf);
        Storage::disk('public')->delete('coverpics/'.$ebook->coverpic);

        $ebook::where('eid',$id)->delete();
    }

    public function search($query){

        $authors=Author::all();
        $publishers=Publisher::all();
        $ebooks=Ebook::where('title','LIKE','%'.$query.'%')
                        ->orderBy('title','desc')
                        ->get();

        return ['ebooks'=>$ebooks,'authors'=>$authors,'publishers'=>$publishers];

    }
}
