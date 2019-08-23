<?php

namespace App\Optional;

use App\Publisher;

class PublisherService{

    public function add($name,$email){

        $publisher=new Publisher;

        $publisher->name=$name;
        $publisher->email=$email;

        $publisher->save();
    }

    public function update($id,$name,$email){

        $publisher = Publisher::find($id);

        $publisher->name=$name;
        $publisher->email=$email;

        $publisher->save();

    }

    public function delete($id){

        $publisher = Publisher::find($id);

        $publisher::where('publisherId',$id)->delete();

    }

    public function search($query){

        $publishers=Publisher::where('name','LIKE','%'.$query.'%')
                        ->orderBy('name','desc')
                        ->get();

        return $publishers;

    }

}
