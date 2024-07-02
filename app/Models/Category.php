<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $table = "Categories";

    protected $fillable = [
        'name',
        'sort_name'
    ];

    public function Subcategory()
    {
        return $this->hasMany('App\Models\SubCategory', 'category_id', 'id');
    }

    public function News()
    {
        return $this->hasManyThrough('App\Models\News', 'App\Models\Subcategory', 'category_id', 'subcategory_id');
    }
}
