<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ActivateController extends Controller
{
    public function index()
    {
        return view('activate.index',[
            'title' => 'Activate',
            'active' => 'activate'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'user_id' => ['required','min:7','max:7','unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => ['required','min:6','max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('activationSuccess','Account Activation success! Please login');
    }
}
