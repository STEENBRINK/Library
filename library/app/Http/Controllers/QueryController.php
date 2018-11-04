<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Book;

class QueryController extends Controller
{

    public function __construct(){
        $this->middleware('admin')->only('admin');
    }

    private $request;
    public function search(Request $request)
    {
        $this->request = $request;
        $books = null;
        if($request['search']) {

            $standard_query =
                Book::where(function ($query) {
                    $query->where('isbn', 'LIKE', '%' . $this->request['search'] . '%')
                        ->orWhere('title', 'LIKE', '%' . $this->request['search'] . '%')
                        ->orWhereRaw("CONCAT(`author_firstname`, ' ', `author_lastname`) LIKE ?", '%' . $this->request['search'] . '%')
                        ->orWhere('distributor', 'LIKE', '%' . $this->request['search'] . '%'); });

            if($request['filter'] == 'All') {

                $books = $standard_query
                        ->orderBy('author_lastname', 'desc')->get();

            }elseif($request['filter'] == 'Available') {

                $books = $standard_query
                        ->where('amount', '>', 'amount_loaned')
                        ->orderBy('author_lastname', 'desc')->get();

            }elseif($request['filter'] == 'Unavailable') {

                $books = $standard_query
                        ->where('amount', '=', 'amount_loaned')
                        ->orderBy('author_lastname', 'desc')->get();
            }

            $term = $request['search'];

        }else{

            if($request['filter'] == 'All') {

                $books =
                    Book::orderBy('author_lastname', 'desc')->get();

            }elseif($request['filter'] == 'Available') {
                $books =
                    Book::where('amount', '>', 'amount_loaned')
                        ->orderBy('author_lastname', 'desc')->get();
            }elseif($request['filter'] == 'Unavailable') {

                $books =
                    Book::where('amount', '=', 'amount_loaned')
                        ->orderBy('author_lastname', 'desc')->get();

            }

            $term = null;

        }

        $filter = $request['filter'];

        return view('books.all', compact('books', 'term', 'filter'));
    }

    public function admin(Request $request) {
        if($request['isadmin'] == 'on'){
            $users = User::where('isadmin', '=', 1)->orderBy('name', 'desc')->get();
            $checked = true;
        }else{
            $users = User::orderBy('name', 'desc')->get();
            $checked = false;
        }

        return view('users.all', compact('users', 'checked'));
    }
}
