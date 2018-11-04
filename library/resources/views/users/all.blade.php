@extends('layout')
@section('content')
    <!-- Rounded switch -->
    <form action="/users" method="POST">
        {{ csrf_field() }}
        <label>Admins Only:</label><br>
        <label class="switch">
            @if($checked)
                <input name="isadmin" type="checkbox" onchange="this.form.submit()" checked>
            @else
                <input name="isadmin" type="checkbox" onchange="this.form.submit()">
            @endif
            <span class="slider round"></span>
        </label>
    </form><br>

    <table>
        <tr>
            <th class="all">Name</th>
            <th>E-mail</th>
            <th>E-mail verified at</th>
            <th>Is Admin</th>
            <th>Edit</th>
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

                <td>
                    <form action="/users/edit/{{$user->id}}">
                        <input type="submit" value="Edit" />
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
@endsection