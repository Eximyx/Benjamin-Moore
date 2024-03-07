<?php

namespace App\Http\Controllers;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\DataTransferObjects\AuthDTO;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
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
    ) {
    }

    public function login(): View
    {
        return view('auth/login');
    }

    /**
     * @throws ValidationException
     */
    public function loginAction(Request $request): RedirectResponse
    {
        $this->service->authAttempt($request);

        return redirect(route('settings'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    /**
     * @throws Exception
     */
    public function profile(): View|AuthResource
    {
        if (request()->ajax()) {
            $entity = $this->service->getUserById((string) Auth::user()['id']);
            $request = app(AuthRequest::class, request()->all());
            $request = $this->service->profileSet($request);

            $entity = $this->service->update(
                $entity,
                AuthDTO::appRequest($request)
            );

            return AuthResource::make($entity);
        }

        return view('admin/profile');
    }
}
