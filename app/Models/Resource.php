<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_resources';
    protected $table = 'resources';

    protected $fillable = [
        'user_resource_id ',
        'cate_resource_id ',
        'resource_title',
        'resource_author',
        'resource_edition',
        'resource_image',
        'resource_file',
        'resource_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_resource_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_resource_id');
    }

    public static function getAll()
    {
        $categories = Category::orderBy('id_categorie', 'desc')->get();
        return $categories;
    }
}
