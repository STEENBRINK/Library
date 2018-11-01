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

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                @if($user->email_verified_at === null)
                    <td> Not verified </td>
                @else
                    <td>{{ $user->email_verified_at }}</td>
                @endif

                @if($user->isadmin == 1)
                    <td> True </td>
                @else
                    <td> False </td>
                @endif

            </tr>
        @endforeach
    </table>
@endsection