<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','category_id','image'];
 
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
