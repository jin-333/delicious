<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Prefecture;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
 public function index(Request $request)
 {
    $posts = Post::with('category')->get();
    $query = Post::with('category','prefecture');
    
      if ($request->filled('keyword')) { 
        $keyword = $request->input('keyword');
        $query->where('title', 'LIKE', "%{$keyword}%");
    }
    
    if($request->filled('category_id') && $request->input('category_id') !== ''){
      $query->where('category_id', $request->input('category_id'));
    }
    if ($request->filled('prefecture_id') && $request->input('prefecture_id') !== '') {
        $query->where('prefecture_id', $request->input('prefecture_id')); // 都道府県フィルターを追加
    }
       
     $posts = $query->get();
     $posts = $query->paginate(10);
     
     
     
     $categories = Category::all();
     $prefectures = Prefecture::all();
     return view('posts.index',compact('posts', 'categories','prefectures'));
 }
 
 public function show(Post $post)
    {
    $post->load(['category']);
    //コメントを取得後に配列に格納する
    $input['comment'] = $post->comments()->with('user')->get();
    return view('posts.show')->with([
        'post' => $post,
        'input' => $input
        ]);
    }
    
public function create()
    {
     $categories = Category::all();
     $prefectures = Prefecture::all();
     
    return view('posts.create', compact('categories','prefectures' ));
    }
      public function edit(Post $post)
{
    return view('posts.edit')->with(['post' => $post]);
}
 
       
      
    
    
    public function store(PostRequest $request, Post $post) //Post.php マニュアルを $post 見習いシェフに渡してる
    {

         
       
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $input['full_address'] = $request['post']['full_address'] ?? null;
        
        $comment = $request['post']['comment'] ?? null;
        $input['comment'] = $comment;
        $post->fill($input)->save();
        
        return redirect()->route('posts.show',[ 'post' => $post->id])->with('success', '投稿完了');

    }
  
   public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
}
    

}
