@extends('layout')
@section('content')
    <table>
        <tr>
            <th class="all">Name</th>
            <th>E-mail</th>
            <th>E-mail verified at</th>
            <th>Is Admin</th>
        </tr>
        @foreach($users as $user)
            <tr class="dohover">
            </tr>
        @endforeach
    </table>
@endsection