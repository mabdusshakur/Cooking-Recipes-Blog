<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:40',
            'email' => 'required|string|email|max:40|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:admin,author,user',
        ];

        $data = $this->authValidation($request->all(), $rules);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
        ]);

        /** @var \Tymon\JWTAuth\JWTGuard $auth */
        $auth = Auth::guard('api');
        $token = $auth->login($user);

        return $this->respondWithToken($token);
    }


    /**
     * Summary of login
     * @param \Illuminate\Http\Request $request
     *  - email: string
     *  - password: string
     * @return \App\Helpers\ResponseHelper::sendSuccess|ResponseHelper::sendError
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|string|max:40',
            'password' => 'required|string',
        ];

        $data = $this->authValidation($request->all(), $rules);

        $email = $data['email'];
        $password = $data['password'];

        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        // Check if user exists
        if(!User::where('email', $email)->exists()){
            return ResponseHelper::sendSuccess('User not found', [], 404);
        }

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return ResponseHelper::sendError('Unauthorized', [], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Summary of respondWithToken
     * @param mixed $token
     * @return JsonResponse|mixed
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }


    protected private function authValidation($request, $rules){
        $validatedData = Validator::make($request, $rules);

        if ($validatedData->fails()) {
            return ResponseHelper::sendError('Validation error', $validatedData->errors(), 422);
        }

        return $validatedData->validated();
    }
}
