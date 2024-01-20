<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    protected Request $request;
    protected AuthService $service;

    public function __construct(AuthService $authService)
    {
        $this->request = new AuthRequest();
        $this->service = $authService;
    }
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {

        $data = $request->validate($this->request->rules());

        $user = $this->service->store($data);

        $this->loginAction($request);

        return redirect()->route('main.index');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        $this->service->authAttempt($request);
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

    public function profile_set(Request $request)
    {
        $validation = $this->service->profileSet($request);
        // We can do it in an another request, but we wont to do that. So be patient :3
        $validation = $validation->validate(['id' => 'required', ...$this->request->rules()]);
        $user = $this->service->store($validation);
        return response()->json($user);
    }

}
