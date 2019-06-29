<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $fillable = ['name','slug', 'parent_id'];

    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public  static  function getCategory() {
        return  self::whereNull('parent_id')->with('children')->get();
    }

//    public function products()
//    {
//        return $this->hasManyThrough(Product::class, Category::class,
//            'parent_id', 'category_id', 'id');
//    }

    public function products() {
        return $this->belongsToMany(Product::class,'product_category');
    }

}
