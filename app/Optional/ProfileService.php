<?php

namespace App\Optional;

use DB;
use Auth;
use Storage;
use App\HomeLibrary;

class ProfileService{

    public function init(){

        $homeLibraryItems=HomeLibrary::all();
        $countOfshoppingcartItems=DB::table('shoppingcart'.Auth::id())->count();

        return ['countOfshoppingcartItems'=>$countOfshoppingcartItems,'homeLibraryItems'=>$homeLibraryItems];

    }

    public function download($id){

        $homeLibraryItems=HomeLibrary::find($id);

        $filePath = storage_path('app/pdfs/'.$homeLibraryItems->pdf);

        return $filePath;

    }

}
