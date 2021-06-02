<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

/**
 * @group Auth endpoints
 */
class ApiRegisterController extends Controller
{
    use ApiResponser;

    /**
     * Register a user
     *
     * @bodyParam name required The name of the user.
     * @bodyParam email required The email of the user.
     * @bodyParam password required The password of the user.
     * @bodyParam password_confirmation required The confirmation password of the user.
     * @bodyParam device_name required The device name.
     * @response {}
     */
    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'device_name' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => Hash::make($attr['password']),
            'email' => $attr['email'],
            'device_name' => $attr['device_name'],
        ]);

        Mail::to($user['email'])->cc('lysander.hans@hotmail.com')->send(new UserRegistered($user->name));

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }
}
