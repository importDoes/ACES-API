<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function guard()
    {
        return Auth::guard('api');
    }

    /**
     * Authenticate student and generate JWT.
     */
    public function login(StudentLoginRequest $request)
    {
        $credentials = $request->validated();

        if (!$token = $this->guard()->attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid LRN or password.',
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Retrieve authenticated student.
     */
    public function me()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Student information retrieved successfully.',
            'data' => $this->guard()->user(),
        ]);
    }

    /**
     * Logout and invalidate JWT.
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out.',
        ]);
    }

    /**
     * Refresh JWT.
     */
    public function refresh()
    {
        return $this->respondWithToken(
            $this->guard()->refresh()
        );
    }

    /**
     * Generate JWT response.
     */
    protected function respondWithToken(string $token)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Authentication successful.',
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => $this->guard()->factory()->getTTL() * 60,
            ],
        ]);
    }
}
