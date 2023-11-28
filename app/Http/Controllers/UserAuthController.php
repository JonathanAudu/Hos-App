<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UserAuthController extends Controller
{
    public function getsignup()
    {
        return view('auth.signup');
    }

    public function postsignup(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:11|unique:users',
            'state' => 'required|string',
            'dob' => 'required',
            'gender' => 'required|in:Male,Female',
        ]);

        $request->merge([
            'role' => 'user',
            'created_by' => null,
            'password' => Hash::make('123456'),
            'user_id' => rand(100000000, 999999999)
        ]);

        User::create($request->all());

        return back()->with('success', 'success');
    }

    public function getsignin()
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'user') {
                return redirect()->intended('user');
            } else {
                return redirect()->intended('admin');
            }
        } else {
            return view('auth.signin');
        }
    }

    public function postsignin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->rememberme)) {
            $request->session()->regenerate();

            if (auth()->user()->role === 'user') {
                return redirect()->intended('user');
            } else {
                return redirect()->intended('admin');
            }
        } else {
            return back()->with('failed', 'Incorrect Email/Password');
        }
    }



    public function ForgetPassword()
    {
        return view('auth.forgot-password');
    }


    public function requestResetMail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('postsignin')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }


    public function resetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }


    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
