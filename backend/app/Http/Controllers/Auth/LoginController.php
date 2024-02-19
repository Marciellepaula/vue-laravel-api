<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            return $this->sendError('Validation Error.', (array)$validator->errors()->toJson(), 400);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User login successfully.');
    }
}
