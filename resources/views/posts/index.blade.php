<!DOCTYPE = html>
<html lang="ja">
    <head>
        <x-app-layout>
    <x-slot name="index">
        <title>Blog</title>
        <meta charset="UTF-8">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel ="styleseet">
        <title>Blade設計</title>
        </x-slot>
    </head>
    <body>
    
    <h1>投稿フォーム</h1>
      <div class='posts'>
          @foreach ($posts as $post)
          <div class='post'>
              <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
              </h2>
              <p>Category: {{ $post->category->name }}</p>
              </div>
              <!-- その他の投稿情報 -->
        @endforeach
      </div>
      <br>
      <a href='/posts/create'>お店を投稿する</a>

   </body>
   </x-app-layout>
   </html>