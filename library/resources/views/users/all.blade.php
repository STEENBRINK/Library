@extends('layout')
@section('content')
    <table>
        <tr>
            <th class="all">Name</th>
            <th>E-mail</th>
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