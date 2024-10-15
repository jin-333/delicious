<!DOCTYPE = html>
<html lang="ja">
    <head>
        <title>投稿詳細</title>
        <meta charset="UTF-8">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel ="styleseet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    
        <h1 class="title">
            {{ $post->title }}
        </h1>
        
        <div class="average-rating mb-3">
            <span class="h5">平均評価</span>
            <span class="stars">
                @for ($i = 1; $i<=5; $i++)
                    @if($i <= round($post->averageRating()))
                        <i class="fas fa-star text-warning"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </span>
        </div>
        
        <div class="content">
            <div class="content_post">
                <h3>本文</h3>
                <p> {{ $post->body }} </p> 
            </div>
            @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。" >
                </div>
            @endif
               
            <br>
                <div class="edit">
                    <a href="/posts/{{ $post->id }}/edit"></a>
                </div>
            </br>
               
            <form action="{{ route('bookmarks.toggle', $post) }}" method="POST">
                @csrf
                <button type="submit">
                    @if(auth()->user()->bookmarks->contains($post))
                        ブックマークを解除
                    @else
                        ブックマークに追加
                    @endif
                </button>
            </form>
            
        </div>
         　 
     　 
        <div class="comment">
            <textarea name="comment" id="comment-content" value="コメントを入力" required></textarea>
            <button type="submit" class="comment-submit-btn" id={{ $post->id }}>コメントを投稿</button>
        </div>    
       
        
             
        <form action="{{ route('ratings.store', $post) }}" method="POST" class="mb-3">
            @csrf
            <div class="rating">
                @for ($i = 5; $i >=1; $i--)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                    <label for="star{{ $i }}" title="{{ $i }}ツ星"><i class="fas fa-star"></i></label>
                @endfor
            </div>
            <button type="submit" class="btn btn-primary mt-2">送信</button>
        </form>
             
        <div class="comments-section">
            <h3>コメント</h3>
            <div id="comments-list">
            @foreach($post->comments()->with('user')->latest()->get() as $comment)
                <div class="comments-show">投稿者:<strong>{{ $comment->user->name }}</strong></div>
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            @endforeach
            </div>
        </div>
                    
                   
                    
        
        <style>
            .rating {
                display: inline-block;
                direction: rtl;
            }
            .rating input {
                display: none;
            }
            .rating label {
                color: #ddd;
                font-size: 24px;
                padding: 0 2px;
                cursor: pointer;
            }
            .rating input:checked ~ label,
            .rating label:hover,
            .rating label:hover ~ label {
                color: #f8ce0b;
            }
            .stars i {
                font-size: 20px;
            }
            .text-secondary {
                color: #ddd;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <div class="footer">
            <a href="/">戻る</a>  
        </div>
         　
         　
         　
        <script src="{{ asset('js/comment.js') }}"></script>
    </body>
</html>