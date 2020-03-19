@extends('layouts.home')

@section('title')
Update Profile
@endsection

@section('content')
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Edit</button>
   --}}
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}
        <div class="modal-body">
            {!! Form::open(['route' => ['userProfile.update', $user ?? ''->id], 'method'=>"put"]) !!}
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" required class="form-control" name='username' id="username">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" required class="form-control" name='email' id="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection