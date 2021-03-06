<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /*
     |------------------------------
     | USER TYPES
     |------------------------------
     */
    const TYPE_ADMIN = 'admin';
    const TYPE_USER = 'user';
    const TYPE = [
        self::TYPE_ADMIN,
        self::TYPE_USER
    ];

    //----------------------------------


    protected $fillable = [
        'name',
        'email',
        'username',
        'avatar',
        'type',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     |------------------------------
     | RELATIONS
     |------------------------------
     |
     |
     |
     */
    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function storylikes()
    {
        return $this->hasMany(StoryLike::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id')->withTimestamps();

    }
}
