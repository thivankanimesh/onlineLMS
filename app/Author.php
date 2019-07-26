<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table="author";
    protected $primaryKey="AuthorId";
    public $incrementing = true;
    public $timestamps = true;
}
