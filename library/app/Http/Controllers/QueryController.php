<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class QueryController extends Controller
{
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        //$query = $request['search'];
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $results =
            Book::where('isbn', 'LIKE', '%' . $request['search'] . '%')
                ->orWhere('title', 'LIKE', '%' . $request['search'] . '%')
                ->orWhereRaw("CONCAT(`author_firstname`, ' ', `author_lastname`) LIKE ?", '%' . $request['search'] . '%')
                ->orWhere('distributor', 'LIKE', '%' . $request['search'] . '%')->get();
        //dd($results);
        // returns a view and passes the view the list of articles and the original query.
        return view('books.search', compact('results'));
    }
}
