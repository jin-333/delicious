<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function user()
    {
        return $this->belongTo(User::class);
    }
    
    public function post()
    {
        return $this->belongTo(Post::class);
    }
}
