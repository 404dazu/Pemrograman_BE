<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // membuat akun authentikasi.
    public function register(Request $request){
        $input=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        $user=User::create($input);
        $data=[
            'message' => 'Your account has been added'
        ];
        return response()->json($data, 200);
    }
// Membuat login untuk mendapatkan tokenAPI
    public function login(Request $request){
        $input = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        
        $user = User::where('email',$input['email'])->first();

        $isLoginSuccesfully=(
            $input['email']==$user->email
            &&
            Hash::check($input['password'], $user->password)
        );
        if($isLoginSuccesfully){
            $token=$user->createToken('auth_token');

            $data=[
                'message' => 'Login is Succesfully',
                'token'=>$token->plainTextToken,
            ];
            return response()->json($data,200);
        }else{
            $data=[
                'message'=>'Username or Password is wrong!'
            ];

            return response()->json($data,401);
        }
    }
}
