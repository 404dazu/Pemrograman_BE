<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($input);

        $data = [
            'messaage' => 'User has been created succesfully'
        ];

        return response()->json($data,200);
    }

    public function login(Request $request){
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];
/*
        $user = User::where('email', $input['email'])->first();
            $isLoginSuccesfully = (
            $input['email'] == $user->email
            &&
            hash::check($input['password'], $user->password)
        );

        if ($isLoginSuccesfully){
            $token = $user->createToen('auth_token');

            $data = [
                'message' => 'Login Failed! Username or Password is wrong!'
            ];
        */
        if (Auth::attemp($input)){
            $token = Auth::user()->createToken('auth_token');

            $data = [
                'message'=>'Login succesfully',
                'token' => $token->plainTextToken
            ];
            return response()->json($data,200);
        } else {
            $data = [
                'message' => 'Username or Password is wrong!, login failed!'
            ];
            return response()->json($data, 401);
        }

    }
}

