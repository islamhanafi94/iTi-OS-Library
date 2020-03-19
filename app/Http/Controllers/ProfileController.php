<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('userProfile',['user' => $user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update',$user);
        return view("editUser", ['user'=>$user]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'username' => ['required', 'string', 'max:255', 
            Rule::unique('users')->where(function ($query) {
                return $query->where('deleted_at', NULL);
            })->ignore($user),],
            'email' => ['string', 'email', 'max:255',
            
            Rule::unique('users')->where(function ($query) {
                return $query->where('deleted_at', NULL);
            })->ignore($user),],
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        if (isset($request->password))
        {
            $user->password = Hash::make($request->password);
            $request->validate([
            'password' => ['min:8|confirmed'],
            'password_confirmation' => 'min:8|confirmed',
            ]);
        }
        $user->save();
        return redirect('home')->with('message', 'Your profile is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
