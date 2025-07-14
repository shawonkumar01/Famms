<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'image',
        'category',  // foreign key
        'price',
        'discount_price',
        'quantity'
    ];


    // Define relationship to Category
    public function category()
{
    // Tell Laravel explicitly the foreign key column is 'category'
    return $this->belongsTo(Category::class, 'category', 'id');
}


}