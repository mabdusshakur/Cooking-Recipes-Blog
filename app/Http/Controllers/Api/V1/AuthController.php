<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Logger;
use App\Helpers\OtpHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:40',
                'email' => 'required|string|email|max:40|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required|string|in:author,user',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // get validated data
            $data = $validator->validated();

            // Initialize OtpHelper
            $otp = new OtpHelper(4, $data['email']);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => $data['role'],
                'otp' => $otp->getOtp(), // Set OTP to user
            ]);

            // Send OTP to user
            $otp->sendOtp($data['email'], ['subject' => 'Account Verification']);


            if ($data['role'] == 'author') {
                $this->authorService->createAuthor(['user_id' => $user->id]);
                return ResponseHelper::sendSuccess('Author registered successfully', [], 201);
            }

            return ResponseHelper::sendSuccess('User registered successfully', [], 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }

    
    /**
     * Summary of verifyOtp
     * find the user by the email, 
     * check if the otp is expired or not, 
     * check if the otp is valid or not, 
     * then if valid otp, set the email_verified_at to the current time,
     * and set the otp to 0.
     * @param string $email
     * @param integer $otp
     * @return JsonResponse|mixed
     */
    public function verifyOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:40',
                'otp' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // get validated data
            $data = $validator->validated();

            $email = $data['email'];
            $otp = $data['otp'];

            // Check if user exists
            $user = User::where('email', $email)->first();
            if(!$user) {
                return ResponseHelper::sendError('User not found', [], 404);
            }

            if($user->updated_at->diffInMinutes(now()) > 2) {
                return ResponseHelper::sendError('OTP expired, please re-generate new', [], 401);
            }

            // check if otp is valid, && otp is not null or 0, && otp is not expired (2 minutes)
            if ($user->otp == $otp && ($otp != null || $otp != 0)) {
                $user->email_verified_at = now();
                $user->otp = 0;
                $user->save();
                return ResponseHelper::sendSuccess('OTP verified successfully', [], 200);
            }

            return ResponseHelper::sendError('Invalid OTP', [], 401);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }


    /**
     * Summary of resendOtp
     * regenerate a otp, save to the user found by email and send the otp to the user
     * @param string $email
     * @return JsonResponse|mixed
     */
    public function resendOtp(){
        try {
            $validator = Validator::make(request()->all(), [
                'email' => 'required|string|email|max:40',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // get validated data
            $data = $validator->validated();

            $email = $data['email'];

            // Check if user exists
            $user = User::where('email', $email)->first();
            if(!$user) {
                return ResponseHelper::sendError('User not found', [], 404);
            }
            
            // Initialize OtpHelper
            $otp = new OtpHelper(4, $email);

            $user->otp = $otp->getOtp(); // Set OTP to user
            $user->save();

            // Send OTP to user
            $otp->sendOtp($email, ['subject' => 'Account Verification']);
            
            return ResponseHelper::sendSuccess('OTP sent successfully', [], 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
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
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|max:40',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // get validated data
            $data = $validator->validated();

            $email = $data['email'];
            $password = $data['password'];

            $credentials = [
                'email' => $email,
                'password' => $password,
            ];

            // Check if user exists
            if (!User::where('email', $email)->exists()) {
                return ResponseHelper::sendSuccess('User not found', [], 404);
            }

            if (!$token = Auth::guard('api')->attempt($credentials)) {
                return ResponseHelper::sendError('Unauthorized', [], 401);
            }

            return $this->respondWithToken($token);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }

    public function profile()
    {
        return ResponseHelper::sendSuccess('User profile', Auth::guard('api')->user(), 200);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return ResponseHelper::sendSuccess('Successfully logged out', [], 200);
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
}
