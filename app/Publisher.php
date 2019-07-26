<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table="publisher";
    protected $primaryKey="publisherId";
    public $incrementing = true;
    public $timestamps = true;
}
