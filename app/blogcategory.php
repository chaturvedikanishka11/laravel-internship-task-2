<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogcategory extends Model
{
    protected $table = "blogcategorys";

    protected $fillable = ['CategoryName', 'Status',];
}
