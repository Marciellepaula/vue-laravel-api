<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8' // Ensure you have a field for password confirmation in your form
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 400);
        }

        // Create a new user record
        $user = $this->createUser($request->all());

        // Generate an access token for the user
        $token = $user->createToken('MyApp')->accessToken;

        // Return a success response with user details and access token
        return response()->json([
            'success' => true,
            'message' => 'User registered successfully.',
            'user' => $user,
            'access_token' => $token
        ], 201);
    }

    protected function createUser(array $data): User
    {
        // Hash the user's password
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
}
