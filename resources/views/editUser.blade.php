@extends('layouts.app')

@section('title')
Update Profile
@endsection

@section('content')
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            {!! Form::close() !!}
        </div>
@endsection