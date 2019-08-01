<?php

namespace App\Optional;

use App\Author;

class AuthorService{

    public function add($name,$email){

        $author=new Author();

        $author->name=$name;
        $author->email=$email;

        $author->save();

    }

    public function update($id,$name,$email){

        $author=Author::find($id);

        $author->name=$name;
        $author->email=$email;

        $author->save();

    }

    public function delete($id){

        $author=Author::find($id);

        $author::where('authorId',$id)->delete();

    }

}
