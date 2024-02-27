<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_article_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_article_id');
    }
}
