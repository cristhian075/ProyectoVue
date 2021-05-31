<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Product extends Model
{
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
