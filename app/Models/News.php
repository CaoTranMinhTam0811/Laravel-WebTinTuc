<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Comment;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sort_title',
        'image',
        'type',
        'link',
        'summary',
        'content',
        'index',
        'view',
        'category_id',
        'subcategory_id',
        'user_id'
    ];

    public function Subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }
}
