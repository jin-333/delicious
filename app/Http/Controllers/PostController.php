<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller


{
 public function index()
 {
    $posts = Post::with('category')->get();
    return view('posts.index',compact('posts'));
 }
 public function show(Post $post)
    {
     $post->load('category');
    return view('posts.show')->with(['post' => $post]);
    }
public function create()
    {
     $categories = Category::all();
    return view('posts.create', compact('categories'));
    }
    //パスワード更新
    public function update(Request $request): RedirectResponse
    {
      $request->user()->fill([
       'password' => Hash::make($requet->newPassword)
       ])->save();
       
       return redirect('/profile');
    }
    
public function store(Request $request)

    {
     $request->validate([
            'post.title' => 'required|max:255',
            'post.body' => 'required',
            'image' => 'required|image|max:2048',
        ]);
     $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();

        $post = new Post($request->input('post'));
        $post->user_id = Auth::id();
        $post->image_url = $image_url;
        $post->save();
        
        return redirect()->route('posts.show',[ 'post' => $post->id])->with('success', '投稿完了');

    }
    

}
