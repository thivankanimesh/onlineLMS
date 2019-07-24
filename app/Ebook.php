<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $table="ebook";
    protected $primaryKey="eid";
    public $incrementing = true;
    public $timestamps = true;
}
