@extends('layouts.app')

@section('title')
Update Profile
@endsection

@section('content')
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="modal-body">
            {!! Form::open(['route' => ['userProfile.update', $user ?? ''->id], 'method'=>"put"]) !!}
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" required class="form-control" name='username' id="username" value="{{$user -> username}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" required class="form-control" name='email' id="email" value="{{$user -> email}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="password">password</label>
                  <input type="password" required class="form-control" name='password' id="password" >
              </div>
              <div class="form-group col-md-6">
                  <label for="password">confirm password</label>
                  <input type="password" required class="form-control" name='confirm_password' id="confirm_password" >
              </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="{{ route('home') }}">Close</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            {!! Form::close() !!}
        </div>
@endsection