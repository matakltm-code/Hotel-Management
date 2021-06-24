<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'address' => ['required']
        ]);
        // dd($data);
        User::where('id', auth()->user()->id)->update($data);
        return redirect('/profile');
    }



}
