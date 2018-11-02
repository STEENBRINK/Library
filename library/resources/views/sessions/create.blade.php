@extends('layout')
@section('content')
    <form method="post" action="/login">

        {{ csrf_field() }}

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="E-mail" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <input type="submit" value="Log in" />

    </form>
    <br>
    <form action="/register">
        <input type="submit" value="Create a new account" />
    </form>

    @include('sections.errors')
@endsection