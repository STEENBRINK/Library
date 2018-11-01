@extends('layout')

@section('content')
    @if (Auth::guest())
        <a href="{{ route('login') }}">Login</a>
    @else

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    @endif
@endsection