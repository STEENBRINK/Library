@extends('layout')

@section('content')
    <table>

        <tr>

            <th>ISBN</th><td>{{$book->isbn}}</td>
        </tr>
        <tr>
            <th>Title</th><td>{{$book->title}}</td>
        </tr>
        <tr>
            <th>Author</th><td>{{$book->author_firstname}} {{$book->author_lastname}}</td>
        </tr>
        <tr>
            <th>Release date</th><td>{{$book->release_date}}</td>
        </tr>
        <tr>
            <th>Distributor</th><td>{{$book->distributor}}</td>
        </tr>
        <tr>
            <th>Edition</th><td>{{$book->edition}}</td>
        </tr>
        <tr>
            <th>Genre</th><td>{{$book->genre}}</td>
        </tr>
        <tr>
            <th>Language</th><td>{{$book->language}}</td>
        </tr>
        <tr>
            <th>Amount</th><td>{{$book->amount}}</td>
        </tr>
        <tr>
            <th>Amount in stock</th><td>{{($book->amount - $book->amount_loaned)}}</td>
        </tr>
        @if($book['minimum_age'] != 0)
            <tr>
                <th>Minimum age</th><td>{{($book->minimum_age)}}</td>
            </tr>
        @endif
        <tr>
            <th class="last">Discription</th><td class="last">{{($book->discription)}}</td>
        </tr>

    </table>
    <br>
    <a href="/books">Back</a>
@endsection