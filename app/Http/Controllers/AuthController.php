<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:jwt', ['except' => ['login']]);
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return ApiResponder::errorResponse([
                    'error' => 'Invalid Credentials'
                ], Response::HTTP_NOT_FOUND);
            }
        } catch (JWTException $e) {
            return ApiResponder::errorResponse([
                'error' => 'Could not create token'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return ApiResponder::successResponse(['token' => $this->createNewToken($token)]);
    }

    public function logout() {
        auth()->logout();
        return ApiResponder::successResponse(['message' => 'User successfully signed out']);
    }

    public function refresh() {
        return $this->createNewToken(auth('api')->refresh());
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60
        ]);
    }

}
