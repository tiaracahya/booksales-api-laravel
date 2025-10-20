<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // 🔹 Menampilkan semua data genre
    public function index()
    {
        return response()->json(Genre::all());
    }

    // 🔹 Menyimpan data genre baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Genre berhasil ditambahkan!',
            'data' => $genre
        ], 201);
    }

    // 🔹 Menampilkan data genre berdasarkan ID
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Genre tidak ditemukan'], 404);
        }

        return response()->json($genre);
    }

    // 🔹 Memperbarui data genre
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Genre tidak ditemukan'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $genre->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Genre berhasil diperbarui!',
            'data' => $genre
        ]);
    }

    // 🔹 Menghapus data genre
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Genre tidak ditemukan'], 404);
        }

        $genre->delete();

        return response()->json(['message' => 'Genre berhasil dihapus!']);
    }
}

