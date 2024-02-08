<?php

namespace App\Services;

use App\Http\Resources\AuthResource;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseService
{
    public string $resource;
    public function __construct(
        AuthRepository $repository
    ) {
        parent::__construct($repository);
        $this->resource = AuthResource::class;
    }

    // TODO Непонятно, как тут использовать репозиторий, если мы вызываем фасад AUTH и реквест валидировать тут тоже не нужно, потому
    // что по логике он дальше в контроллере уходит в store, предварительно провалидировав полученные данные

    public function profileSet(Request $request):Request
    {
        $data = $request->all();
        $data['id'] = Auth::user()->id;

        if (!($data['password'] !== null)) {
            $data['password'] = Auth::user()->password;
        }
        $request->replace($data);

        return $request;
    }

    /**
     * @throws ValidationException
     */
    public function authAttempt(Request $request):void
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        request()->session()->regenerate();
    }
}
