@extends('layout')
@section('content')
    <form method="post" action="/login">

        {{ csrf_field() }}

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="E-mail" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <button type="submit">Log in</button>

    </form>

    @include('sections.errors')
@endsection