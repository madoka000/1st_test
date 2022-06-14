<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class='create'>[<a href='/posts/create'>create</a>]</p>
        <div class='posts'>
             @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <form action="/posts/{{ $post->id }}" id="form_delete" method="post">
                        @csrf
                        {{ method_field('delete') }}
                        <input type="submit" style="display:none">
                        <p class='delete'>[<span onclick="return deletePost(this);">delete</span>]</p>
                    </form>
                    <script>
                function deletePost(e) {
                    'use strict';
                    if (confirm(' 削除すると復元できません。\n本当に削除しますか？')){
                    　　document.getElementById('form_delete').submit();
                    }　　
                }
                </script>
                </div>
             @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
         </div>
         <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html> 