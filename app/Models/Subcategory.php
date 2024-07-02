<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\News;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_name',
        'category_id'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function News()
    {
        return $this->hasMany(News::class, 'subcategory_id', 'id');
    }
}
