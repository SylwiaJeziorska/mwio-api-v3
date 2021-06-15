<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
   public function signIn(Request $request)
   {
   $credentials = request(['email', 'password']);
       if (!auth()->attempt($credentials)) {
       return response(['message' => 'Invalid Credentials']);
   }
       $accessToken = auth()->user()->createToken('authToken')->accessToken;
       return response(['user' => auth()->user(), 'access_token' => $accessToken]);
   }
}
