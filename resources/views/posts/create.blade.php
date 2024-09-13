<!DOCTYPE = html>
<html lang="ja">
    <head>
        <title>ブログ投稿</title>
        <meta charset="UTF-8">
        <!--Fonts-->
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel ="styleseet">
    </head>
    <body>
       <form action="/posts" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="title">
            <p>タイトル:</p>
             <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/><br>
             <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
           </div>
           <div class="body"></div>
            <p>メッセージ:</p>
             <textarea name="post[body]" placeholder="投稿内容を入力" value="{{ old('post.body') }}"/></textarea><br>
             <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
             <div class="category">
              
              <select id="category_id" name="post[category_id]" required >
               @foreach($categories as $category)
               <option value="{{ $category->id}}">{{ $category->name }}</option>
               @endforeach
              </select>
             </div>
             
             <div class="image">
            <input type="file" name='image'>
           </div>
             <input type="submit" value="保存"/><br>
           </div>
       </form> 
       <div class=footer>
        <a href="/">投稿画面へ戻る</a>
        </div>
    </body>
</html>