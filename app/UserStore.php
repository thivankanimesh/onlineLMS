<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStore extends Model
{
    protected $table="userstore";
    protected $primaryKey="ebookId";
    public $incrementing = true;
    public $timestamps = true;

    public function setTableName($name){
        $this->table=$name;
    }
}
