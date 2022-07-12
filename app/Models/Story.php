<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'user_id',
        'title',
        'text'
    ];

    /*
     |------------------------------
     | RELATION
     |------------------------------
     |
     |
     |
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
