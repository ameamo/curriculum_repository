<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        <h1>Blog Name</h1>
        <div class="posts">
            @foreach ($posts as $onepost)
                <div class="post">
                    <h2 class="title">
                        <a href="/posts/{{ $onepost->id }}">
                            {{ $onepost->title }}
                        </a>
                    </h2>
                    <a href="/categories/{{ $onepost->category->id }}">{{ $onepost->category->name }}</a>
                    <p class="body">{{ $onepost->body }}</p>
                    <form action="/posts/{{ $onepost->id }}" id="form_{{ $onepost->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $onepost->id }})">delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="paginate">{{ $posts->links() }}</div>
        <a class="back" href="/" >戻る</a>
        <script>
            function deletePost(id) {
                'use strict'
                
                if (confirm("削除すると復元できません。\n本当に削除しますか？")) {
                    document.getElementById(`form_${id}`) .submit();
                }
            }
            
        </script>
    </body>
</html>