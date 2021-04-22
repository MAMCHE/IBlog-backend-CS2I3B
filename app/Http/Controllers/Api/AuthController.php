<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(request $request)
    {
        $validatedData = $request->validate(
            [
                'name'=>'required|max:55',
                'email'=>'email|required|unique:users',
                'password'=>'required'
            ]
        ) ;

        $validatedData['password']=bcrypt($request->password);

        $user=User::create($validatedData);

        //$accessToken=$user-> createToken('authToken')->accessToken;
        //, 'access_token'=> $accessToken

        return response(['user'=> $user]);

    }

    public function login(request $request)
    {
        $logindData = $request->validate(
            [
                'email'=>'email|required',
                'password'=>'required'
            ]
        ) ;

        if(!auth()->attempt($logindData))
        {
            return response(['message'=> 'Invalid credentials']);
        }

        //$accessToken=auth()->user()-> createToken('authToken')->accessToken;
        //, 'access_token'=> $accessToken

        return response(['user'=> auth()->user()]);


    }

}
