<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\user;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request) {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Hash::make($validateData['password']);
        $validateData['password'] = $hashedPassword;

        $user = User::create($validateData);

        return response($user, Response::HTTP_CREATED);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token', $token, 60 * 24);
            return response(["token"=>$token], Response::HTTP_OK)->withCookie($cookie);
        } else {
            return response(["message" => "Credenciales invalidas"],Response::HTTP_UNAUTHORIZED);
        }
    }

    public function userProfile(Request $request) {
        return response()->json([
            "message" => "userProfile OK",
            "userdata" => auth()->user()
        ], Response::HTTP_OK);
    }

    public function logout() {
        $cookie = Cookie::forget('cookie_token');
        return response(["message" => "Cierre de sesión OK"], Response::HTTP_OK)->withCookie($cookie);
    }

    public function allUsers() {

    }
}
