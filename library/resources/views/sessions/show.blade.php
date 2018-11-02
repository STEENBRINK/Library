@extends('layout')

@section('content')
    <form action="/edit">
        <input type="submit" value="Edit Your Data" />
    </form>
    <form action="/logout">
        <input type="submit" value="Logout" />
    </form>
@endsection