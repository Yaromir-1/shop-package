<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('blogpackage/css/app.css') }}" rel="stylesheet" />
</head>
<body>
<h1>Showing all Postsdfgfgdfgfdgfdgghjghj666666</h1>

@forelse ($posts as $post)
    <li>{{ $post->title }}</li>
@empty
    <p> 'No posts yet' </p>
@endforelse
<div class="well">
    helloworls
</div>
</body>
</html>