<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table='shoppingcart';
    protected $primaryKey="itemNo";
    public $incrementing = true;
    public $timestamps = true;

    public function __construct(){
        $this->table='shoppingcart'.Auth::id();
    }

    public function setTable($name){
        $this->table=$name;
    }
}
