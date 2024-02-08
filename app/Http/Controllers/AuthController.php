<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\AuthDTO;
use App\Http\Resources\AuthResource;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public string $dto;
    public string $resource;
    public string $request;

    public function __construct(
        protected AuthService $service,
    )
    {
        $this->dto = AuthDTO::class;
        $this->resource = AuthResource::class;
        $this->request = AuthRequest::class;
    }

    public function register():View
    {
        return view('auth/register');
    }

    /**
     * @throws ValidationException
     */
    public function registerSave(Request $request):RedirectResponse
    {
        $request = new $this->request($request->all());

        $dto = $this->dto::appRequest(
            $request
        );

        $this->service->create($dto);

        $this->loginAction($request);

        return redirect()->route('main.index');
    }

    public function login():View
    {
        return view('auth/login');
    }

    /**
     * @throws ValidationException
     */
    public function loginAction(Request $request):RedirectResponse
    {
        $this->service->authAttempt($request);

        return redirect('admin/');
    }

    public function logout(Request $request):RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    public function profile():View
    {
        return view('admin/profile');
    }

    public function profileSet(Request $request):JsonResource
    {
        $entity = $this->service->findById((string)Auth::user()->id);

        $request = $this->service->profileSet(new $this->request($request->all()));

        // TODO We can do it in an another request, but we wont to do that. So be patient :3

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        return $this->resource::make($entity);
    }
}
