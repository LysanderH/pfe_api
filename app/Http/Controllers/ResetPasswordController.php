<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    public function checkEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required'
        ]);

        $email = $validated['email'];

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        DB::table('password_resets')->where('email', $email)->delete();

        $token = \Illuminate\Support\Str::random(10);

        while (DB::table('password_resets')->where('token', $token)->exists()) {
            $token = \Illuminate\Support\Str::random(10);
        }

        Mail::to($email)->send(new ForgotPassword($token));

        DB::table('password_resets')->insert(compact('email', 'token'));

        return response()->json(true);
    }

    public function checkToken($token)
    {
        $user = DB::table('password_resets')->where('token', $token)->get();

        if (!$user) {
            return abort(404);
        }

        return view('resetPassword', ['token' => $token]);
    }

    public function updateUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:password_resets,email',
            'token' => 'required|exists:password_resets,token',
            'password' => 'required|string|min:8|confirmed'
        ]);

        User::where('email', $validated['email'])->update([
            'password' => Hash::make($validated['password']),
        ]);

        DB::table('password_resets')->where('email', $validated['email'])->delete();

        return redirect()->back()->with('success', 'Votre mot de passe a été mis à jour');
    }
}
