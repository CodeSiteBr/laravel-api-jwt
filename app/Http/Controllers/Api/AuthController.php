<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        try {

            $this->validateLogin($request);

            $credentials = $this->credentials($request);
            $token = \JWTAuth::attempt($credentials);
            return $this->responseToken($token);

        } catch (JWTException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function responseToken($token)
    {
            if($token){
                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
                ]);
            }else{
                return response()->json([
                    'error' => \Lang::get('auth.failed')
                ], 400);
            }

    }

    public function logout()
    {
        try {
            \Auth::guard('api')->logout();
            return response()->json([], 204); //No-content
        } catch (JWTException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function refresh()
    {
        try {
            $token = \Auth::guard('api')->refresh();
            return $this->responseToken($token);
        } catch (JWTException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 401);
        }
    }

    public function me()
    {
        try {
            return response()->json(\Auth::guard('api')->user());
        } catch (JWTException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
