<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

    // Define relationship to Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category', 'id');
    }
}
