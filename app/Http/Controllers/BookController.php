<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // GET /books
    public function index()
    {
        return response()->json(Book::all());
    }

    // POST /books
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'published_year' => 'required|integer',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'published_year' => $request->published_year,
        ]);

        return response()->json($book, 201);
    }

    // GET /books/{id}
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    // PUT /books/{id}
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->only([
            'title',
            'summary',
            'author_id',
            'genre_id',
            'published_year'
        ]));

        return response()->json($book);
    }

    // DELETE /books/{id}
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}


