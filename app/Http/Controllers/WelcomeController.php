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

        //book fetching
        $ebooks=Ebook::all();

        if(Auth::check()&&Schema::hasTable('shoppingcart'.Auth::id())){
            $countOfshoppingcartItems=DB::table('shoppingcart'.Auth::id())->count();

            return view('welcome')->with(['ebooks'=>$ebooks,'countOfshoppingcartItems'=>$countOfshoppingcartItems]);
        }else{
            return view('welcome')->with(['ebooks'=>$ebooks]);
        }

    }
}
