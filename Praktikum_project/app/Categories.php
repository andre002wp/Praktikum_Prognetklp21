<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'product_categories';
    protected $fillable = ['id','category_name'];
}
