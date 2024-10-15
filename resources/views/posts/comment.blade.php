<!DOCTYPE = html>
<html lang="ja">
    <head>
        <title>Blog</title>
        <meta charset="UTF-8">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel ="styleseet">
        <title>Posts</title>
        <body>
            <form action="/posts/{{ $post->id }}"  method = POST>
                @csrf
                <div class="comment">
                    <textarea type="textarea" name="comment" value="コメントを入力" required>
                    <button type="submit">コメントを投稿</button>
                    <br>
                    <br>
                    <p>{{ $comment->comment }}</p>
                    <small>{{ $comment->created_at }}</small>
                </div>
        </body>