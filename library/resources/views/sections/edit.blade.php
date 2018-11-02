@extends('layout')
@section('content')
    <form method="post" action="/update">

        {{ csrf_field() }}

        @yield('info')

        <label for="name">Update name</label>
        <input type="text" id="name" name="name"autofocus>

        <label for="email">Update e-mail</label>
        <input type="email" id="email" name="email">

        <label for="birth_date">Update Birthdate</label>
        <input type="date" id="birth_date" name="birth_date">

    @yield('extra_fields')

        <input type="submit" value="Update" />

    </form>

    @include('sections.errors')
    <br>
    @yield('extra_content')
@endsection