<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * @group Auth endpoints
 */
class ApiLoginController extends Controller
{
    use ApiResponser;

    /**
     * Authenticate a user
     *
     * @bodyParam email required
     * @bodyParam password required
     * @bodyParam device_name required
     *
     * @response {
     *      data: "2|qQpZb2sWHmBtvCflqx4sKBugfbW8zKrYMcAOCpAL",
     *      status: 200,
     *      statusText: "OK",
     *      headers: {…},
     *      config: {…}, 
     * }
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }

    /**
     * Logout a user
     *
     * @authenticated
     * @header Authorization Bearer USER_TOKEN
     */
    public function logout()
    {
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(Auth::user());
    }
}
