<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'last_name',
        'nick_name',
        'email',
        'password',
        'user_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class, 'user_public_id');
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'user_public_id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'user_article_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'user_resource_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'user_categorie_id');
    }
}
