<?php

namespace App\Http\Controllers\Admin\SettingsControllers;

use App\Services\Admin\SettingsServices\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $service,
    )
    {
    }

    public function login(): View
    {
        return view('admin.pages.login');
    }

    /**
     * @throws ValidationException
     */
    public function loginAction(Request $request): RedirectResponse
    {
        $this->service->authAttempt($request);

        return redirect(route('settings.index'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }
}
