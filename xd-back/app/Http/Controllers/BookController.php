<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);     

        return Book::create($validated);
    }
 public function show($id)
{
    $book = Book::find($id);

    if (!$book) {
        return response()->json(['message' => 'Könyv nem található.'], 404);
    }

    return response()->json($book);
}

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return $book;
    }

    public function destroy()
    {
        $book = Book::find(request('id'));
        $book->delete();
        return response()->json($book);
    }
}
