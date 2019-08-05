<?php

namespace App\Optional;

use DB;
use Auth;
use App\HomeLibrary;

class ProfileService{

    public function init(){

        $ebooks=HomeLibrary::all();
        $countOfshoppingcartItems=DB::table('shoppingcart'.Auth::id())->count();

        return ['countOfshoppingcartItems'=>$countOfshoppingcartItems,'ebooks'=>$ebooks];

    }

}
