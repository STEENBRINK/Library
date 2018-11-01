@extends('layout')
@section('content')
    <form method="post" action="/update">

        {{ csrf_field() }}

        <input type="hidden" id="id" name="id" value="{{Auth::user()->id}}">

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required autofocus>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>

        <label for="birth_date">Birth Date</label>
        <input type="date" id="birth_date" name="birth_date" value="{{ Auth::user()->birth_date }}" required>

        <label for="old_password">Your current password</label>
        <input type="password" id="old_password" name="old_password" required>

        <label for="new_password">Password</label>
        <input type="password" id="new_password" name="new_password"  value="">

        <label for="new_password_confirmation">Verify Password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation">

        <button type="submit">Register</button>

    </form>

    @include('sections.errors')
@endsection