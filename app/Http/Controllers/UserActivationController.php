<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserActivationRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class UserActivationController
{


    public function __construct(protected UserRepository $userRepository)
    {

    }

    public function __invoke(UserActivationRequest $request,User $user)
    {
        $update = $this->userRepository->toggleStatus($user);

        return redirect()->intended();
    }
}
