<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseService
{
    public function __construct(AuthRepository $authRepository)
    {
        parent::__construct($authRepository);
    }


    // TODO Непонятно, как тут использовать репозиторий, если мы вызываем фасад AUTH и реквест валидировать тут тоже не нужно, потому 
    // что по логике он дальше в контроллере уходит в store, предварительно провалидировав полученные данные
    public function profileSet($request)
    {
        $data = $request->all();
        $data['id'] = Auth::user()->id;

        if (!($data['password'] !== null)) {
            $data['password'] = Auth::user()->password;
        }
        $request->replace($data);

        return $request;
    }

    public function authAttempt($request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        $request->session()->regenerate();
    }
}
