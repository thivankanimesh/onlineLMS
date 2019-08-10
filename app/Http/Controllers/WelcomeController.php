<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Schema;
use App\Ebook;
use App\ShoppingCart;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $ebooks=Ebook::all();

        if(Auth::check()&&Schema::hasTable('shoppingcart'.Auth::id())){

            $countOfshoppingcartItems=DB::table('shoppingcart'.Auth::id())->count();

            return view('welcome')->with(['ebooks'=>$ebooks,'countOfshoppingcartItems'=>$countOfshoppingcartItems]);
        }else{
            return view('welcome')->with(['ebooks'=>$ebooks]);
        }

    }

    public function viewEbook($id){

        $ebook=Ebook::find($id);

        if(Auth::check()&&Schema::hasTable('shoppingcart'.Auth::id())){

            $countOfshoppingcartItems=DB::table('shoppingcart'.Auth::id())->count();

            return view('viewebook')->with(['ebook'=>$ebook,'countOfshoppingcartItems'=>$countOfshoppingcartItems]);
        }else{
            return view('viewebook')->with(['ebook'=>$ebook]);
        }
    }
}
