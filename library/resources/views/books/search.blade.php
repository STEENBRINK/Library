@extends('layout')

@section('content')
    <form method="POST" action="/search">
        {{ csrf_field() }}
        <input placeholder="Search..." name="search" type="text" required><br>
        <input type="submit" value="Search" />
    </form>

    <h1>Results:</h1>
    @if (count($results) === 0)
        <p>Sorry, we coudn't find anything</p>
    @elseif (count($results) >= 1)<table>
        <tr>
            <th class="all">ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Distributor</th>
            <th>Amount available</th>
        </tr>
        @foreach($results as $result)
            <tr class="dohover">
                <td><a href="/books/{{$result->isbn}}">{{$result->isbn}}</a></td>
                <td><a href="/books/{{$result->isbn}}">{{$result->title}}</a></td>
                <td><a href="/books/{{$result->isbn}}">{{$result->author_firstname}} {{$result->author_lastname}}</a></td>
                <td><a href="/books/{{$result->isbn}}">{{$result->distributor}}</a></td>
                <td><a href="/books/{{$result->isbn}}">{{($result->amount-$result->amount_loaned)}}</a></td>
            </tr>
        @endforeach
    </table>
    @endif
    <br>
    <a href="/books"><button>Back to all books</button></a>
@endsection