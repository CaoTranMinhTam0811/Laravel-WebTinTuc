<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\News;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'news_id',
        'user_id'
    ];

    public function News()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
