<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = [
    'name', 
    'prefecture',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
