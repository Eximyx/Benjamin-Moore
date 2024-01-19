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
            'isdmin' => 0
        ]);


        if (!Auth::attempt($request->only('email', 'password'), true)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('main.index');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        $request->session()->regenerate();

        return redirect('admin/');

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    public function profile(Request $request)
    {
        // $roles = User::getRoles();
        return view('admin/profile');

    }
    public function profileUSer(Request $request)
    {
        // $roles = User::getRoles();
        return view('user/profile');

    }

    public function profile_set()
    {

        $data = request()->all();
        $data['id'] = Auth::user()->id;
        if (!($data['password'] !== null)) {
            $data['password'] = Auth()->user()->password;
        }

        $user = Validator::make($data, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        $user = User::updateOrCreate([
            'id' => $data['id']

        ], 
        [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']]);
        return response()->json($user);
    }

}
