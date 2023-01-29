<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken,'status'=>1]);
        
    }
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials','status'=>0]);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        Session::put('accesstoken', $accessToken);

        return response(['user' => auth()->user(), 'access_token' => $accessToken,'status'=>1]);

    }
    
    public function sendPasswordResetMail(Request $request)
    {
        
    }
}
