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
                <div class="row justify-content-center">
                    <form method="GET" action="{{route('userProfile.edit', $user->id)}}">
                        <input class="btn btn-primary" type="submit" value="Update"/>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection