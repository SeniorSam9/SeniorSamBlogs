<?php

// blade is laravel templating engine (like nunjucks)
// all its code will be compiled as the normal php code
//also the php extension is allowing us to inject the normal php code
# {{ escapes html tags }} so for rendering html body you use {!! //here goes your content !!}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    @foreach ($posts as $p)
        <article>
            <h1><a href={{ 'post/' . $p ->slug  }}{{ $p -> title }}</a></h1>
            <h2>{{$p -> excerpt}}</h2>
        </article>
    @endforeach
</body>
</html>