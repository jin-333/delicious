<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illiminate\Support\Facades\DB;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    
     protected $fillable = [
       'title',
       'body',
       'image_url',
       'user_id',
       'category_id',
       'prefecture_id',
       'full_address',
];
    public function getByLimit(int $limit_count = 10)
{
    return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
}
public function getCategoryNameAttribute()
{
    return config('category'.$this->category_id);    
}
    

public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function prefecture(): BelongsTo
    {
    return $this->belongsTo(Prefecture::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    
    public function full_address()
    {
        return $this->hasone(Fulladress::class);
    }
    
    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }
}
