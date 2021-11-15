<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController

{
    public function login(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        $user = User::where('name', '=', $data['name'])->get()->first();

        if ($user) {
            if (!Hash::check($data['password'], $user->password)) {
                return back()->withErrors([
                    'password' => 'Неправильный пароль',
                ]);
            }
        } else {
            $user = User::create([
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                ]);
        }
        Auth::login($user);

        return back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
