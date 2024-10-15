<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'rating',
        'user_id',
        'post_id',
        ];
        
        public function posts()
        {
            return $this->belogsto(Post::class);
        }
        
        public function user()
        {
        return $this->belongsTo(User::class);
        }
}
