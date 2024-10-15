<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Full_address extends Model
{
    protected $fillable = [
            'full_address'
            ];
            
     use HasFactory;
     public function posts()
    {
       return $this->hasOne(Post::class);
    }
}
