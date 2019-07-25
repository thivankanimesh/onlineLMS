<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";
    protected $primaryKey="id";
    public $incrementing = true;
    public $timestamps = true;
}
