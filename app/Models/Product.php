<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'description', 
        'price', 
        'image', 
        'category_id', 
        'is_featured'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}
