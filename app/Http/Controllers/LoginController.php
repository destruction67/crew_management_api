<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $loginRequest) : JsonResponse {

        if (!Auth::attempt(['username' => $loginRequest->username, 'password' => $loginRequest->password]))
            return response()->json(['message' => 'Wrong username or password / Unauthorized'], 401);

        $user = $loginRequest->user();
        $tokenResponse = $user->createToken('Personal Access Token');
        $token = $tokenResponse->token;

        if ($loginRequest->remember_me)
            $token->expires_at = Carbon::now()->addWeek();
        $token->save();

        return response()->json([
            'token' => $tokenResponse->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResponse->token->expires_at)
                ->toDateString(),
            'user' => $user
        ]);


    }
}
