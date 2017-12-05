<?php

namespace App\Http\Controllers;

//use App\Church;
use App\User;
use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTExceptions;

class ApiAuthController extends Controller
{
    public function login()
    {
        $credentials = request()->only('email', 'password');

        try
        {
            $token = JWTAuth::attempt($credentials);

            if (!$token) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }

        catch (JWTException $e)
        {

            return response()->json(['error' => 'something_went_wrong'], 500);
        }

        return response()->json(['token' => $token], 200);
    }


    public function register()
    {
        $email = request()->email;
        $name = request() -> name;
        $password = request()->password;

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['token' => $token], 200);
    }


}
