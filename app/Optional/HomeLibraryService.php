<?php

namespace App\Optional;

use DB;
use Auth;
use App\Ebook;
use App\HomeLibrary;
use App\ShoppingCart;
use Illuminate\Support\Facades\Schema;

class HomeLibraryService{

    public function store($shoppingCart){

        if(!Schema::hasTable('homelibrary'.Auth::id())){

            DB::statement('CREATE TABLE homelibrary'.Auth::id().' (
                homeLibraryItemId int AUTO_INCREMENT PRIMARY KEY,
                title varchar(255),
                description varchar(255),
                category varchar(255),
                author varchar(255),
                publisher varchar(255),
                coverpic varchar(255),
                pdf varchar(255),
                updated_at varchar(100),
                created_at varchar(100),
                ebookId bigint(20) unsigned
            )');

            DB::statement('ALTER TABLE homelibrary'.Auth::id().'
                ADD FOREIGN KEY(ebookId) references ebook(eid)');
        }

        $ebookIds=$shoppingCart->get('ebookId');

        foreach($ebookIds as $ebookId){

            $homeLibrary=new HomeLibrary();

            $ebook=Ebook::find($ebookId);

            $homeLibrary->title=$ebook[0]->title;
            $homeLibrary->description=$ebook[0]->desc;
            $homeLibrary->category=$ebook[0]->category;
            $homeLibrary->author=$ebook[0]->author;
            $homeLibrary->publisher=$ebook[0]->publisher;
            $homeLibrary->coverpic=$ebook[0]->coverpic;
            $homeLibrary->pdf=$ebook[0]->pdf;
            $homeLibrary->ebookId=$ebook[0]->eid;

            $homeLibrary->save();
        }

    }

}
