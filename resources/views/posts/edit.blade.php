<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit_post</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body>
        <h1>編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="content__title">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" value="{{ $post->title }}">
                </div>
                <div class="content__body">
                    <h2>本文</h2>
                    <textarea name="post[body]">{{ $post->body }}</textarea>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>