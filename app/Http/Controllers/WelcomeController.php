<?php

namespace App\Http\Controllers;

use App\Ebook;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        //book fetching
        $ebooks=Ebook::all();

        return view('welcome')->with('ebooks',$ebooks);
    }
}
