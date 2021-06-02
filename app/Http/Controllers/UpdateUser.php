<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUser extends Controller
{
    /**
     * Update a user
     *
     * @bodyParam name required The name of the user.
     * @bodyParam email required The email of the user.
     * @bodyParam password required The password of the user.
     * @bodyParam newpassword required The password of the user.
     * @bodyParam newpassword_confirmation required The confirmation password of the user.
     * @bodyParam device_name required The device name.
     * @response {}
     */
    public function update(Request $request)
    {
        info($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'password' => 'required',
            'newpassword' => 'string|confirmed|nullable',
        ]);
        info($validated);

        $user = User::find($request->user()->id);

        if (Hash::check($validated['password'], $user->password)) {
            if ($request->user()->email === $validated['email']) {
                if (isset($validated['newpassword'])) {
                    $user->update([
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'password' => Hash::make($validated['newpassword']),
                    ]);
                } else {
                    $user->update([
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                    ]);
                }
            } else {
                $validateEmailUserId = User::where('email', $validated['email'])->first();
                if (!$validateEmailUserId) {
                    if (isset($validated['newpassword'])) {
                        $user->update([
                            'name' => $validated['name'],
                            'email' => $validated['email'],
                            'password' => Hash::make($validated['newpassword']),
                        ]);
                    } else {
                        $user->update([
                            'name' => $validated['name'],
                            'email' => $validated['email'],
                        ]);
                    }
                } else {
                    return response()->json(['message' => 'L’adresse mail existe déjà.'], 404);
                }
            }
        } else {
            return response()->json(['message' => 'Le mot de passe ne correspond pas'], 404);
        }

        return response()->json(['user' => $user]);
    }
}
