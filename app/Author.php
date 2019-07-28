<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table="author";
    protected $primaryKey="authorId";
    public $incrementing = true;
    public $timestamps = true;
}
