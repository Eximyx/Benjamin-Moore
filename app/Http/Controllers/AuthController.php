<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    protected Request $request;

    public function __construct(){
        $this->request = new CreateAdminRequest();
    }
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(AuthService $service ,Request $request)
    {
        $request = $request->validate($this->request->rules());
        $data = $service->store($request);
        return response()->json($data);

        // User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'User_role_id' => 0
        // ]);


        // if (!Auth::attempt($request->only('email', 'password'), true)) {
        //     throw ValidationException::withMessages([
        //         'email' => trans('auth.failed')
        //     ]);
        // }

        // $request->session()->regenerate();

        // return redirect()->route('main.index');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(LoginRequest $request)
    {
        $request->validated();
        
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
        return view('admin/profile');

    }
    public function profileUSer(Request $request)
    {
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
