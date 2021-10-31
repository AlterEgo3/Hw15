<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController

{
    public function login(Request $request)
    {
        $user = User::where('name', $request->get('name'))->get()->first();
        $credentials = $request->only('name', 'password');
        if($request->method() == 'POST') {
            if($user == null) {

                $request -> validate([
                    'name' => ['required'],
                    'password' => ['required'],
                ]);
                User::create([
                    'name' => $request->get('name'),
                    'password' => password_hash($request->get('password'), 1),
                    'remember_token' => md5(Str::random(10)),
                ]);
            }

            if(Auth::attempt($credentials)){
                return view('layout');
            }
            return redirect('/#2')->withErrors([
                'password' => 'Имя пользователя и пароль не совпадают',
            ]);
        }

        Auth::login($user);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
