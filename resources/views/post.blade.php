<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post -> title }}</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <article>
        <h1>{{ $post -> title }}</h1>
        <div>{!! $post -> body !!}</div>
        <a href="/">Go Back</a>
    </article>
</body>
</html>