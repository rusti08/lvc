<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //All Books
    public function index()
    {
        $books = DB::select("SELECT * FROM books");
        return response()->json(["books" => $books]);
    }

    //Add Books
    public function add(Request $request)
    {
        $book = new Book([
            'name' => $request->name,
            'author' => $request->author
        ]);
        $book->save();

        return response()->json('The book successfully added');
    }

    // edit book
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    // update book
    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->json('The book successfully updated');
    }

    // delete book
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json('The book successfully deleted');
    }
}
