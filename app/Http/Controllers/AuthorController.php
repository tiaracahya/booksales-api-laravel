<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    // 🔹 Menampilkan semua data author
    public function index()
    {
        return response()->json(Author::all());
    }

    // 🔹 Menyimpan data author baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string'
        ]);

        $author = Author::create([
            'name' => $request->name,
            'biography' => $request->biography,
        ]);

        return response()->json([
            'message' => 'Author berhasil ditambahkan!',
            'data' => $author
        ], 201);
    }

    // 🔹 Menampilkan author berdasarkan ID
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author tidak ditemukan'], 404);
        }

        return response()->json($author);
    }

    // 🔹 Memperbarui data author
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author tidak ditemukan'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string'
        ]);

        $author->update([
            'name' => $request->name,
            'biography' => $request->biography,
        ]);

        return response()->json([
            'message' => 'Author berhasil diperbarui!',
            'data' => $author
        ]);
    }

    // 🔹 Menghapus data author
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author tidak ditemukan'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Author berhasil dihapus!']);
    }
}
