<!DOCTYPE html>
<html>
<head>
    <title>Authors</title>
</head>
<body>
    <h1>Daftar Author</h1>
    <ul>
        @foreach ($authors as $author)
            <li>{{ $author->name }}</li>
            <li>{{ $author->bio }}</li>
        @endforeach
    </ul>
</body>
</html>
