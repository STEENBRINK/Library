<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin')->except('index', 'show');
    }

    public function index()
    {
        $books = Book::orderBy('author_lastname', 'desc')->get();
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
            'isbn' => ['required', 'string', 'max:13', 'unique:books'],
            'title' => ['required', 'string', 'max:255'],
            'author_firstname' => ['required', 'string', 'max:255'],
            'author_lastname' => ['required', 'string', 'max:255'],
            'release_date' => ['required', 'date'],
            'distributor' => ['required', 'string', 'max:255'],
            'discription' => ['required'],
            'genre' => ['required', 'string'],
            'edition' => ['required', 'integer', 'max:3'],
            'language' => ['string', 'max:255', 'nullable'],
            'amount' => ['integer', 'max:5', 'nullable'],
            'amount_loaned' => ['integer', 'max:5', 'nullable'],
            'minimum_age' => ['integer', 'max:2', 'nullable']
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
