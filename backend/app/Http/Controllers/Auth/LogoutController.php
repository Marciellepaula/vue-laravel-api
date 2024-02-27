<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the authenticated user
            $user = $request->user();

            // Check if the user has tokens
            if ($user->tokens()->count() > 0) {
                // Revoke all tokens associated with the user
                $user->tokens()->delete();
            }
        }

        // Log the user out
        Auth::logout();

        // Return a response indicating success
        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ]);

}
