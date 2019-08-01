<?php

namespace App\Optional;

use DB;
use Auth;
use App\Ebook;
use App\UserStore;
use App\ShoppingCart;
use Illuminate\Support\Facades\Schema;

class UserStoreService{

    public function store($shoppingCart){

        if(!Schema::hasTable('userstore'.Auth::id())){

            DB::statement('CREATE TABLE userstore'.Auth::id().' (
                userStoreItemId int AUTO_INCREMENT PRIMARY KEY,
                title varchar(255),
                description varchar(255),
                category varchar(255),
                author varchar(255),
                publisher varchar(255),
                coverpic varchar(255),
                pdf varchar(255),
                updated_at varchar(100),
                created_at varchar(100),
                ebookId bigint(10)
            )');

            DB::statement('ALTER TABLE userstore'.Auth::id().'
                ADD FOREIGN KEY(ebookId) references ebook(eid)');
        }

        $ebookIds=$shoppingCart->get('ebookId');

        foreach($ebookIds as $ebookId){

            $userStore=new UserStore();
            $userStore->setTableName('userstore'.Auth::id());

            $ebook=Ebook::find($ebookId);

            \error_log($ebook);

            $userStore->title=$ebook[0]->title;
            $userStore->description=$ebook[0]->desc;
            $userStore->category=$ebook[0]->category;
            $userStore->author=$ebook[0]->author;
            $userStore->publisher=$ebook[0]->publisher;
            $userStore->coverpic=$ebook[0]->coverpic;
            $userStore->pdf=$ebook[0]->pdf;
            $userStore->ebookId=$ebook[0]->eid;

            $userStore->save();
        }

    }

}
