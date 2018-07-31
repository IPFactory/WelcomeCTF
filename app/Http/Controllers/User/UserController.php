<?php

namespace App\Http\Controllers\User;

use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use App\Service\UserService as UserService;


class UserController extends Controller
{
    private $user;
    private $UserService;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->UserService = new UserService($this->user);
    }

    public function getUser () {
        return $this->UserService->getInfo();
    }
    public function getRatio () {
        return $this->UserService->getPei();
    }
    public function getList () {
        return $this->UserService->getList();
    }


}
