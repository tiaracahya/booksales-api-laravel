<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #aaa;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>📚 Daftar Buku</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Genre</th>
                <th>Tahun Terbit</th>
                <th>Ringkasan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name ?? 'Tidak ada' }}</td>
                    <td>{{ $book->genre->name ?? 'Tidak ada' }}</td>
                    <td>{{ $book->published_year ?? '-' }}</td>
                    <td>{{ $book->summary ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Belum ada data buku</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

