<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_categorie';
    protected $table = 'categories';
    protected $fillable = ['user_categorie_id', 'categorie_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_categorie_id');
    }

    public function publication()
    {
        return $this->hasMany(Publication::class, 'cate_public_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'categorie_article_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'cate_resource_id');
    }

    public static function getAllCategories()
    {
        return Category::all();
    }
}
