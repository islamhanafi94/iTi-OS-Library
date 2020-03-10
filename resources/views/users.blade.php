@extends('layouts.lib')

@section('content')
    @isset($users)
        <table class="users" colspan="2">
            <thead>
                <tr>
                    <th>username</th>
                    <th>email</th>
                    <th>is active</th>
                    <th>is admin</th>
                    <th colspan="2">actions</th>
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
                        <td><a href="{{route('user.edit',$user->id)}}"><button>update</button></a></td>
                        <td>
                            <form action="{{route('user.destroy',$user->id)}}" method="POST" style="display:inline-block">
                                <input type="submit" value="delete" class="btn btn-primary">
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