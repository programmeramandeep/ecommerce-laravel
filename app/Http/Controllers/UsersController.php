<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use App\User;
use Hash;
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
     * User dashboard page.
     *
     * @return void
     */
    public function dashboard()
    {
        return view('pages.users.my-dashboard')->with(['user' => auth()->user(), 'active' => 'dashboard']);
    }

    /**
     * User download page.
     *
     * @return void
     */
    public function downloads()
    {
        return view('pages.users.my-downloads')->with(['user' => auth()->user(), 'active' => 'downloads']);
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

        User::find(auth()->user()->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * User password change page.
     *
     * @return void
     */
    public function password_edit()
    {
        return view('pages.users.my-password')->with(['user' => auth()->user(), 'active' => 'password']);
    }

    /**
     * User password change request.
     *
     * @return void
     */
    public function password_update(PasswordChangeRequest $request)
    {
        User::find(auth()->user()->id)
            ->update([
                'password' => Hash::make($request->{'new-password'}),
            ]);

        return redirect()
            ->back()
            ->with('success', 'Password has been changed successfully!');
    }

    /**
     * User address page.
     *
     * @return void
     */
    public function address_edit()
    {
        return view('pages.users.my-address')->with(['user' => auth()->user(), 'active' => 'address']);
    }

    /**
     * User address change request.
     *
     * @return void
     */
    public function address_update(Request $request)
    {
        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }
}
