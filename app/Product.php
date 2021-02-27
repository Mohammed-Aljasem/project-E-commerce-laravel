<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function ordersproduct()
    {
        return $this->belongsTo(Order::class, 'order_products');
    }
    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class);
    }
    
}
