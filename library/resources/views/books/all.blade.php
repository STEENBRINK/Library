@extends('layout')
@section('content')

    @if (Auth::check())
        @if (Auth::user()->isadmin)
            <form action="/books/create">
                <input type="submit" value="Add New Book" />
            </form><br>
        @endif
    @endif
    <br>

    <form method="POST" action="/search">
        {{ csrf_field() }}
        @if($term === null)
            <input placeholder="Search..." name="search"><br>
        @else
            <input value= "{{ $term }}" name="search"><br>
        @endif
        <input type="submit" value="Search" /><br><br>
        @if($filter == 'All')
            <select name="filter" onchange="this.form.submit()">
                <option selected>All</option>
                <option>Available</option>
                <option>Unavailable</option>
            </select>
        @elseif($filter == 'Available')
            <select name="filter" onchange="this.form.submit()">
                <option>All</option>
                <option selected>Available</option>
                <option>Unavailable</option>
            </select>
        @elseif($filter == 'Unavailable')
            <select name="filter" onchange="this.form.submit()">
                <option>All</option>
                <option>Available</option>
                <option selected>Unavailable</option>
            </select>
        @endif
    </form><br>


    <h1>Results:</h1>
    @if (count($books) === 0)
        <p>Sorry, we coudn't find anything</p>
    @elseif (count($books) >= 1)<table>
        <tr>
            <th class="all">ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Distributor</th>
            <th>Amount available</th>
        </tr>
        @foreach($books as $result)
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
    @if(!($term === null))
        <form action="/books">
            <input type="submit" value="Show All" />
        </form><br>
    @endif
@endsection