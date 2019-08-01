<?php

namespace App\Optional;

use App\Author;
use App\Publisher;
use App\Ebook;

class AdminService
{
    public function init(){

        $authors=Author::all();
        $publishers=Publisher::all();
        $ebooks=Ebook::orderBy('eid','desc')->get();

        return ['authors'=>$authors,'publishers'=>$publishers,'ebooks'=>$ebooks];

    }
}
