@extends('sections.edit')
@section('info')

        <input type="hidden" id="id" name="id" value="{{Auth::user()->id}}">

        <label>Only fill in the fields you want to change and your password to confirm it's you.</label><br><br>

@endsection
@section('extra_fields')

        <label for="new_password">Update Password</label>
        <input type="password" id="new_password" name="new_password"  value="">

        <label for="new_password_confirmation">Verify updated password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation"><br><br>

        <label for="old_password">Your current password</label>
        <input type="password" id="old_password" name="old_password" required>

@endsection