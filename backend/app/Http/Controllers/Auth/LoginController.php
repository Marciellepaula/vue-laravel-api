<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        Log::info("login started");

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 400);
        }


        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

        $user = Auth::user();

        $success['name'] = $user->name;

        $accessToken = $user->createToken('MyApp')->accessToken->token;

        return response()->json([
            'success' => true,
            'message' => 'Login successfully.',
            'token' => $accessToken, // Return only the token string
        ], 200);
    }

    protected function sendError($message, $data = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}
