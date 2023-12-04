<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
// <<<<<<< trying-to-add-auth
//             'IsAdmin' => 1
//         ]);

//         return redirect()->route('login');
=======
//            'IsAdmin' => 1
//         ]);

        if (!Auth::attempt($request->only('email', 'password'), true)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('welcome',);
// >>>>>>> main
    }

    public function login()
    {
// <<<<<<< trying-to-add-auth
// =======
//        dd($request);


// >>>>>>> main
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
// <<<<<<< trying-to-add-auth
// =======
//        dd($request);
// >>>>>>> main
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
// <<<<<<< trying-to-add-auth
// =======
//        dd($request,auth()->check());
// >>>>>>> main

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
// <<<<<<< trying-to-add-auth

//         $request->session()->regenerate();

//         return redirect()->route('dashboard');
// =======
        $request->session()->regenerate();

        return redirect('admin/dashboard');
// >>>>>>> main
    }

    public function logout(Request $request)
    {
// <<<<<<< trying-to-add-auth
// =======
//        dd('logout');
// >>>>>>> main
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    public function profile()
    {
        return view('admin/profile');
    }
}
