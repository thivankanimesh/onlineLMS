<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class HomeLibrary extends Model
{
    protected $table="homelibrary";
    protected $primaryKey="homeLibraryItemId";
    public $incrementing = true;
    public $timestamps = true;

    public function __construct(){
        $this->table='homelibrary'.Auth::id();
    }
}
