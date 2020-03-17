<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users', ["users" => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,NULL,id,deleted_at,NULL'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/dashboard/user')->with('status', 'Added new User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('update', ['id' => $user->id, "user" => User::find($user->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', "unique:users,username,$user->id,id,deleted_at,NULL"],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$user->id,id,deleted_at,NULL"],
        ]);


        if (isset($request->isactive))
            $user->is_active = 1;
        else
            $user->is_active = 0;
        if (isset($request->isadmin))
            $user->is_admin = 1;
        else
            $user->is_admin = 0;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
        return redirect("/dashboard/user")->with('status', 'User Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect("/dashboard/user")->with('status', 'User Deleted Successfuly');
    }

    public static function getCommentOwnner(array $ids)
    {
        foreach ($ids as $id) {
            $user = User::find($id);
            $ownnerNames[] = ['id' => $user->id, 'ownner' => $user->username];
        }
        return $ownnerNames;
    }

    public static function getFavoritesBooks($id)
    {
        return  User::find($id)->favorites;
    }
}
