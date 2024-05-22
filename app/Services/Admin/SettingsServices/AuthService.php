<?php

namespace App\Services\Admin\SettingsServices;

use App\DataTransferObjects\AuthDTO;
use App\Models\User;
use App\Repositories\SettingRepositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * @param AuthRepository $repository
     */
    public function __construct(
        protected AuthRepository $repository
    )
    {
    }

    /**
     * @param User $entity
     * @param AuthDTO $dto
     * @return User
     */
    public function update(User $entity, AuthDTO $dto): User
    {
        $dto = $dto->toArray();

        return $this->repository->update(
            $entity,
            $dto,
        );
    }

    /**
     * @param Request $request
     * @return Void
     * @throws ValidationException
     */
    public function authAttempt(Request $request): void
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        
        request()->session()->regenerate();
    }
}
