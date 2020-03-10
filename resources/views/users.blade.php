@extends('layouts.dashboard')

@section('content')
    @isset($users)
        <table class="table table-striped" colspan="2">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Active</th>
                    <th scope="col">Admin</th>
                    <th scope="col" class="text-center" colspan="2">Actions</th>
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
                        <td><a href="{{route('user.edit',$user->id)}}"><button class="btn btn-primary ">update</button></a></td>
                        <td>
                            <form action="{{route('user.destroy',$user->id)}}" method="POST" style="display:inline-block">
                                <input type="submit" value="delete" class="btn btn-danger">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    @endisset
@endsection