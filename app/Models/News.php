<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'user_id','age_restriction'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
