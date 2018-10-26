<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('author_firstname', 'desc')->get();
        return view('books.all', compact('books'));
    }

    public function show($isbn)
    {
        $book = Book::where('isbn', '=', $isbn)->first();
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|max:13',
            'title' => 'required',
            'author_firstname' => 'required|max:50',
            'author_lastname' => 'required|max:50',
            'release_date' => 'required',
            'distributor' => 'required|max:50',
            'discription' => 'required',
            'genre' => 'required',
            'edition' => 'required|max:3'
        ]);

        if($request['language'] === null){
            $request['language'] = 'Nederlands';
        }
        if($request['amount']=== null){
            $request['amount'] = 1;
        }
        if($request['amount_loaned']=== null){
            $request['amount_loaned'] = 0;
        }
        if($request['minimum_age']=== null){
            $request['minimum_age'] = 0;
        }

        //safely create new book using post data
        //save book to database

        Book::create(request(['isbn', 'title', 'author_firstname', 'author_lastname', 'release_date', 'distributor', 'discription', 'genre', 'edition', 'language', 'minimum_age', 'amount']));

        //redirect

        return redirect('/books');
    }
}
