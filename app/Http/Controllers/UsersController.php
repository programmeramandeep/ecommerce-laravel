<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.users.my-profile')->with(['user' => auth()->user(), 'active' => 'details']);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'required|phone:IN',
        ]);

        $user->update($request->only('name', 'email', 'phone'));

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }

    public function dashboard()
    {
        return view('pages.users.my-dashboard')->with(['user' => auth()->user(), 'active' => 'dashboard']);
    }

    public function downloads()
    {
        return view('pages.users.my-downloads')->with(['user' => auth()->user(), 'active' => 'downloads']);
    }

    public function password_edit()
    {
        return view('pages.users.my-password')->with(['user' => auth()->user(), 'active' => 'password']);
    }

    public function password_update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'required|phone:IN',
        ]);

        $user->update($request->only('name', 'email', 'phone'));

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }

    public function address_edit()
    {
        return view('pages.users.my-address')->with(['user' => auth()->user(), 'active' => 'address']);
    }

    public function address_update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'required|phone:IN',
        ]);

        $user->update($request->only('name', 'email', 'phone'));

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }
}
