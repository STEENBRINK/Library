@extends('layout')
@section('content')
    <form method="post" action="/update">

        {{ csrf_field() }}

        <input type="hidden" id="id" name="id" value="{{Auth::user()->id}}">

        <label>Only fill in the fields you want to change and your password to confirm it's you.</label><br><br>

        <label for="name">Update name</label>
        <input type="text" id="name" name="name"autofocus>

        <label for="email">Update e-mail</label>
        <input type="email" id="email" name="email">

        <label for="birth_date">Update Birthdate</label>
        <input type="date" id="birth_date" name="birth_date">

        <label for="new_password">Update Password</label>
        <input type="password" id="new_password" name="new_password"  value="">

        <label for="new_password_confirmation">Verify updated password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation"><br><br>

        <label for="old_password">Your current password</label>
        <input type="password" id="old_password" name="old_password" required>

        <button type="submit">Register</button>

    </form>

    @include('sections.errors')
@endsection