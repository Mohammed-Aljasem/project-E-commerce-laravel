<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class) ;
    }
}
