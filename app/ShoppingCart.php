<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table='shoppingcart';
    protected $primaryKey="itemNo";
    public $incrementing = true;
    public $timestamps = true;

    public function setTable($name){
        $this->table=$name;
    }
}
