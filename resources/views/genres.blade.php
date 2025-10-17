<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Genres</title>
</head>
<body>
    <h1>Ini adalah halaman Genre dari Buku</h1>

    @foreach ($genres as $genre)
        <ul>
            <li><strong>Nama Genre:</strong> {{ $genre->name }}</li>
            <li><strong>Deskripsi:</strong> {{ $genre->description }}</li>
        </ul>
    @endforeach

</body>
</html>
