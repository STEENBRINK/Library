@extends('sections.edit')
@section('info')

    <input type="hidden" id="id" name="id" value="{{$user->id}}">
    <input type="hidden" id="admin_id" name="admin_id" value="{{Auth::user()->id}}">

    <label>Only fill in the fields you want to change.</label><br><br>


@endsection
@section('extra_content')
    @if(Auth::user()->isadmin == 1)
        <form method="POST" action="/admin">

            {{ csrf_field() }}
            <input type="hidden" id="id" name="id" value="{{$user->id}}">
            <input type="hidden" id="admin_id" name="admin_id" value="{{Auth::user()->id}}">

        @if($user->isadmin == 1)
            <input type="submit" value="Revoke Admin" />
        @else
            <input type="submit" value="Make Admin" />
        @endif
        </form>
    @endif
    <form method="post" action="/delete">

        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$user->id}}">
        <input class="delete" type="submit" value="DELETE ACCOUNT" />

    </form>

@endsection