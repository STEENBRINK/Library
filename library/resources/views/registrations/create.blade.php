@extends('layout')
@section('content')
    <form method="post" action="/register">

        {{ csrf_field() }}

        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" required autofocus>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="E-mail" required>

        <label for="birth_date">Birth Date</label>
        <input type="date" id="birth_date" name="birth_date" placeholder="Birth Date" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <label for="password_confirmation">Verify Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Verify password" required>

        <button type="submit">Register</button>

    </form>

    @include('sections.errors')
@endsection