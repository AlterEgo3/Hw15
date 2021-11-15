<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class OauthController
{
    public function index()
    {
        $parameters = [
            'client_id' => config('oauth.ds.client_id'),
            'redirect_uri' => config('oauth.ds.redirect_uri'),
            'response_type' => 'code',
            'scope' => 'identify',
        ];

        $url = 'https://discord.com/api/oauth2/authorize?' . http_build_query($parameters);

        return redirect($url);

//        dd($url);

    }

    public function callback(Request $request)
    {
        $response = Http::asForm()
            ->post('https://discord.com/api/oauth2/token', [
                'client_id' => config('oauth.ds.client_id'),
                'client_secret' => config('oauth.ds.client_secret'),
                'grant_type' => 'authorization_code',
                'code' => $request->get('code'),
                'redirect_uri' => config('oauth.ds.redirect_uri'),
            ]);

//        $response = json_decode($response->body(), true);

//        dd($response);

        $access_token = $response->json('access_token');
        $token_type = $response->json('token_type');
        $expires_in = $response->json('expires_in');
        $scope = $response->json('scope');


        $response = Http::WithHeaders([
            'Authorization' => $token_type . ' ' . $access_token

        ])->get('https://discord.com/api/v8/users/@me');

//        dd($response->body());
//        $ds_user=$response->json('username');
//        dd($ds_user);

        $user = User::updateOrCreate([
            'name' => $response->json('username')
        ], [
            'name' => $response->json('username'),
            'password' => Hash::make(Str::random(10)),
            'remember_token'=>md5(Str::random(10)),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

}
