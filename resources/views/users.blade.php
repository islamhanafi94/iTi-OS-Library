@extends('layouts.dashboard')

@section('content')
<button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target=".add-user-modal">Add New
    User</button>

<div class="modal fade add-user-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-username">Adding New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'user.store']) !!}
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" required class="form-control" name='username' id="username">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" required class="form-control" name='email' id="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" required class="form-control" name='password' id="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" required class="form-control" name='password_confirmation'
                        id="password_confirmation">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@isset($users)
<table class="table table-striped h5">
    <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Active</th>
            <th scope="col">Admin</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>@if ($user->is_active ==1)
                yes
                @elseif($user->is_active ==0)
                no
                @endif</td>
            <td>@if ($user->is_admin ==1)
                yes
                @elseif($user->is_admin ==0)
                no
                @endif</td>
            <td>
                <div class="btn-toolbar">
                    <!-- <button class="btn btn-primary btn-group mr-4" data-toggle="modal" data-target=".update-user-modal">Update</button> -->
                    <i class="material-icons edit" data-toggle="modal" data-target="#update-user-modal-{{$user->id}}">&#xE254;</i>
                    <div class="modal fade update-user-modal-{{$user->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-username">Update User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('user.update',$user->id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" required class="form-control" name='username'
                                                id="username" value="{{$user->username}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" required class="form-control" name='email' id="email"
                                                value="{{$user->email}}">
                                        </div>
                                        <label for=" isactive">Active</label>
                                        <input type="checkbox" name="isactive" @if ($user->is_active == 1)
                                        checked
                                        @endif>

                                        <label for="isadmin">Admin</label>
                                        <input type="checkbox" name="isadmin" @if ($user->is_admin == 1)
                                        checked
                                        @endif>
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <form action="{{route('user.destroy',$user->id)}}" method="POST" style="display:inline-block">
                        <!-- <input type="submit" value="Delete" class="btn btn-danger btn-group"> -->
                        {!! Form::button ('<i class="material-icons delete">&#xE872;</i>' ,['type' => 'submit' , 'class' => 'deletebtn']) !!}
                        @csrf
                        @method('DELETE')
                    </form>
                    </div>    
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endisset
@endsection