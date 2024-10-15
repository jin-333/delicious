<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;  

class BookmarkController extends Controller
{
    public function toggle(Request $request, Post $post)
    {
        $request->user()->bookmarks()->toggle($post->id);
        return back();
    }
    
    public function index(Request $request)
    {
        $bookmarks = $request->user()->bookmarks()->paginate(10);
        return view('posts.bookmark', compact('bookmarks'));
    }
}
