<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $table = 'resources';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_resource_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_resource_id');
    }
}
