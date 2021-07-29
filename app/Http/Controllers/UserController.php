<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Parser;

class UserController extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $request->merge(['password' => bcrypt($request->input('password'))]);
        $user = User::create($request->only(['name', 'email', 'password']));

        $personalAccessToken = $user->createToken('MyApp');
        $tokenData = [
            'access_token' => $personalAccessToken->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($personalAccessToken->token->expires_at)->toDateTimeString()
        ];

        return response()->json($tokenData);
    }

    public function login(LoginRequest $request){
        if(Auth::attempt($request->only(['email', 'password']))){
            $user = Auth::user();
            $personalAccessToken = $user->createToken('Password Token');
            $tokenData = [
                'access_token' => $personalAccessToken->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($personalAccessToken->token->expires_at)->toDateTimeString()
            ];
            return response()->json($tokenData);
        }
        else{
            return response()->json(['error'=>'El usuario y la contraseña son incorrectos'], 401);
        }
    }

    public function logout(Request $request){
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();

        $response = 'You have been logged out';
        return response()->json($response, 200);
    }

    public function me()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return response()->json($user);
    }
}
