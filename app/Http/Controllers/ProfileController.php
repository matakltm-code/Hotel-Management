<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::findorfail(auth()->user()->id);
        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function edit()
    {
        // ProfileController::checkIfItsMe($user->id);

        $user = User::findorfail(auth()->user()->id);
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        // ProfileController::checkIfItsMe($user->id);

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
        ]);
        // dd($data);
        User::where('id', auth()->user()->id)->update($data);
        return redirect('/profile')->with('success', 'Profile updated successfuly!');
    }
}
