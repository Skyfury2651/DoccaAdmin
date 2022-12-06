<?php

namespace App\Http\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected User $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function checkExitedEmail(string $email): bool
    {
        return $this
            ->model
            ->query()
            ->where('email', $email)
            ->exists();
    }

    public function loginUser(array $params) {
        if (Auth::attempt($params)) {
            return $this->generateToken();
        }

        throw new \Exception('Email or password wrong',422);
    }

    public function registerUser(array $params, bool $isMember = false)
    {
       $user = $this->model->create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password']),
        ]);

       $user->assignRole($isMember ? Role::ROLE_MEMBER : Role::ROLE_CUSTOMER);

       Auth::login($user);

       return $this->generateToken();
    }

    public function generateToken()
    {
        if (Auth::check()) {
            $listRole = Auth::user()->getRoleNames();
            return Auth::user()->createToken('accessToken', $listRole->toArray());
        }

        throw new \Exception('No user logged',401);
    }
}
