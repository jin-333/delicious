<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   public function store(Request $request, Post $post)
   {
        $postId = $request->post_id;
        $post = $post->where("id", "=", $postId)->first();
       
        $comment = $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);
        
        $param = [
            'user_name' => Auth::user()->name,
            'comment_contents' => $request->comment,
            'created_at' => $comment->created_at,
        ];
        
        return response()->json($param);
   }
}
