@extends('layout')
@section('content')
    @if (Auth::check())
        @if (Auth::user()->isadmin)
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
                        @if(!($user->email_verified_at === null))
                            <td>{{ $user->email_verified_at }}</td>
                        @else
                            <td>Not verified</td>
                        @endif
                        <td>
                            @if($user->isadmin)
                                True
                            @else
                                False
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            This content is unavailable.
            <a href="/">Return home</a>
            <?php header('/') ?>
        @endif
    @else
        This content is unavailable.
        <a href="/">Return home</a>
        <?php header('/') ?>
    @endif


@endsection
