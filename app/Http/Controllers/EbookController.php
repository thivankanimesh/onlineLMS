<?php

namespace App\Http\Controllers;

use App\Ebook;
use App\Optional\EbookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index(){

    }

    public function add(Request $req){

        $ebookService=new EbookService();

        $title=$req->get('title');
        $description=$req->get('description');
        $category=$req->get('category');
        $author=$req->get('author');
        $publisher=$req->get('publisher');
        $price=$req->get('price');
        $coverpic=$req->file('coverpic');
        $pdf=$req->file('pdf');

        $ebookService->addEbook($title,$description,$category,$author,$publisher,$price,$coverpic,$pdf);

        return redirect('/admin');

    }

    public function update(Request $req,$id){

        $ebookService=new EbookService();

        $title=$req->get('title');
        $description=$req->get('description');
        $category=$req->get('category');
        $author=$req->get('author');
        $publisher=$req->get('publisher');
        $price=$req->get('price');
        $coverpic=$req->file('coverpic');
        $pdf=$req->file('pdf');

        $ebookService->updateEbook($id,$title,$description,$category,$author,$publisher,$price,$coverpic,$pdf);

        return redirect('/admin');
    }

    public function delete(Request $req,$id){

        $ebookService=new EbookService();

        $ebookService->deleteEbook($id);

        return redirect('/admin');
    }
}
