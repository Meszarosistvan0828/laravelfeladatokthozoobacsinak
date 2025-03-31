<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function listBooks()
    {
        return response()->json(Book::all());
    }

    public function searchBooks($query)
    {
        return response()->json(Book::where('title', 'like', "%$query%")
            ->orWhere('author', 'like', "%$query%")
            ->get());
    }

    public function createLoan(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        if ($book->available_copies > 0) {
            $loan = Loan::create(['book_id' => $book->id, 'user_id' => $request->user_id]);
            $book->decrement('available_copies');
            return response()->json($loan, 201);
        }
        return response()->json(['error' => 'No copies available'], 400);
    }

    public function returnLoan($id)
    {
        $loan = Loan::findOrFail($id);
        if (!$loan->returned) {
            $loan->update(['returned' => true]);
            $loan->book->increment('available_copies');
        }
        return response()->json($loan);
    }

    public function listLoans()
    {
        return response()->json(Loan::all());
    }
}