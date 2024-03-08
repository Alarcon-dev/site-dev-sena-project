<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_publication';
    protected $table = 'publications';


    protected $fillable = [
        'user_public_id',
        'cate_public_id',
        'public_title',
        'public_content',
        'public_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_public_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_public_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'public_like_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'public_comment_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'public_comment_id');
    }

    public static function getAll()
    {
        $publications = Publication::orderBy('id_publication', 'desc')->get();
        return $publications;
    }
}
