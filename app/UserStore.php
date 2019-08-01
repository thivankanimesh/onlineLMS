<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class UserStore extends Model
{
    protected $table="userstore";
    protected $primaryKey="userStoreItemId";
    public $incrementing = true;
    public $timestamps = true;

    public function __construct(){
        $this->table='userstore'.Auth::id();
    }
}
