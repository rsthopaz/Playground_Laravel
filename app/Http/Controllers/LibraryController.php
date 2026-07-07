<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    //
       public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id'],
        ]);

        try {

            DB::transaction(function () use ($request) {

                $book = Book::findOrFail($request->book_id);

                $alreadyBorrowed = Borrowing::where('user_id', $request->user_id)
                    ->where('book_id', $request->book_id)
                    ->whereNull('returned_at')
                    ->exists();

                if ($alreadyBorrowed) {
                    throw new \Exception('User still borrowing this book');
                }


                if ($book->stock <= 0) {
                    throw new \Exception('Book stock is empty');
                }


                Borrowing::create([
                    'user_id' => $request->user_id,
                    'book_id' => $request->book_id,
                    'borrowed_at' => now(),
                ]);


                $book->decrement('stock');

            });


            return response()->json([
                'message' => 'Borrow success'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 400);

        }
    }
}
