@extends('layouts.lib')

@section('content')
    <form action="{{route('users.update',$id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="username">name</label>
        <br>
        <input type="text" name="username" placeholder="name" value="{{$user->username}}" required>
        <br>
        <label for="email">email</label>
        <br>
        <input type="text" name="email" placeholder="email" value="{{$user->email}}" required>
        <br>
        <label for="password">password</label>
        <br>
        <input type="password" name="password" placeholder="password" value="{{$user->password}}"required>
        <br>
        <label for="confirmpassword">confirm password</label>
        <br>
        <input type="password" name="confirmpassword" placeholder="confirm password" value="{{$user->password}}" required>
        <br>
        <label for="isactive">is active</label>
        <input type="checkbox" name="isactive" @if ($user->is_active == 1)
            checked
        @endif>
        <br>
        <label for="isadmin">is admin</label>
        <input type="checkbox" name="isadmin" @if ($user->is_admin == 1)
            checked
        @endif>
        <br>
        <input type="submit" value="update">
    </form>
@endsection