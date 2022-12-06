<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\UserService;
use App\Http\Traits\HasResponseApi;

class AuthController extends Controller
{
    use HasResponseApi;

    public function login(LoginRequest $request, UserService $userService)
    {
        try {
            $token = $userService->loginUser($request->only(['email', 'password']));

            return $this->apiResponse($token);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }

    public function register(RegisterRequest $request, UserService $userService)
    {
        try {
            $token = $userService->registerUser($request->only(['email', 'password', 'name']));

            return $this->apiResponse($token);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }
}
