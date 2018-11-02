@extends('sections.edit')
@section('info')

    <input type="hidden" id="id" name="id" value="{{$user->id}}">
    <input type="hidden" id="admin_id" name="admin_id" value="{{Auth::user()->id}}">

    <label>Only fill in the fields you want to change.</label><br><br>

@endsection
@section('extra_content')
    <form action="/">
        <input type="submit" value="Reset Password" />
    </form>
@endsection