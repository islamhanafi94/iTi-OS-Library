@extends('layouts.app')

@section('title')
User Profile
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12" id="exampleModal">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">User Profile</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("userProfile.update",$user->id)}}"
                        enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        {{-- <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">User Name</label>
                                <input type="text" name="username" class="form-control" value="{{$user ?? ''->username}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$user ?? ''->email}}" >
                                </div>
                            </div>
                        </div> --}}
                        <br>
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row justify-content-center">
                            {{-- {!! Form::open(['route' => ['userProfile.edit', $user ?? ''->id], 'method'=>"GET"]) !!} --}}
                            <form method="GET" action="{{route('userProfile.edit', $user->id)}}">
                                <input class="btn btn-primary" type="submit" value="Update"/>
                            </form>    
                        </div>
                        <div class="clearfix"></div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection