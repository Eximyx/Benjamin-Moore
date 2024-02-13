<?php

namespace App\Services;

use App\DataTransferObjects\AuthDTO;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        protected AuthRepository $repository
    )
    {
    }

    public function update(User $entity, AuthDTO $dto): User
    {
        $dto = (array)$dto;

        return $this->repository->update(
            entity: $entity,
            dto: $dto
        );
    }

    public function getUserById(string $id)
    {
        return $this->repository->getUserById($id);
    }

    public function profileSet(AuthRequest $request): AuthRequest
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
