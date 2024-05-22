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
    /**
     * @param AuthService $service
     */
    public function __construct(
        protected AuthService $service,
    )
    {
    }

    /**
     * @return View
     */
    public function login(): View
    {
        return view('admin.pages.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function loginAction(Request $request): RedirectResponse
    {
        $this->service->authAttempt($request);

        return redirect(route('settings.index'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }
}
