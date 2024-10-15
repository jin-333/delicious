<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Post;

class RatingController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'rating' => 'integer|between:1,5'
            ]);
            
            $rating = Rating::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'post_id' => $post->id
                ],
                [
                    'rating' => $request->rating,
                    'user_id' => auth()->id(),
                    'post_id' => $post->id
                    ]
                );
                
                return redirect()->back()->with('success', '評価が送信されました！');
    }
}
