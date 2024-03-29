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
    public function __construct(
        protected AuthRepository $repository
    ) {
    }

    public function update(User $entity, AuthDTO $dto): User
    {
        $dto = $dto->toArray();

        return $this->repository->update(
            entity: $entity,
            dto: $dto
        );
    }

    /**
     * @throws ValidationException
     */
    public function authAttempt(Request $request): void
    {
        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        request()->session()->regenerate();
    }
}
