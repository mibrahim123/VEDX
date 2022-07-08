<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;

class UserController extends Controller
{
    public function __construct(
        UserRepository $user
    )
    {
        $this->user = $user;
    }

    public function login()
    {
        return $this->user->login();
    }

    public function register(RegisterRequest $request)
    {
        return $this->user->register($request->all());
    }
}
