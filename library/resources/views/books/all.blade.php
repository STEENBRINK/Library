@extends('layout')
@section('content')

    <form method="POST" action="/search">
        {{ csrf_field() }}
        <input placeholder="Search..." name="search" type="text" required><br>
        <button type="submit">Search</button>
    </form><br>

    @if (Auth::check())
        @if (Auth::user()->isadmin)
            <button><a href="/books/create">Add books</a></button><br>
        @endif
    @endif
    <br>

    <table>
        <tr>
            <th class="all">ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Amount available</th>
        </tr>
            @foreach($books as $book)
                    <tr class="dohover">
                        <td><a href="/books/{{$book->isbn}}">{{$book->isbn}}</a></td>
                        <td><a href="/books/{{$book->isbn}}">{{$book->title}}</a></td>
                        <td><a href="/books/{{$book->isbn}}">{{$book->author_firstname}} {{$book->author_lastname}}</a></td>
                        <td><a href="/books/{{$book->isbn}}">{{($book->amount-$book->amount_loaned)}}</a></td>
                    </tr>
            @endforeach
    </table>
@endsection