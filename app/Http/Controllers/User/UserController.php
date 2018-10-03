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
        try {
            $this->user = JWTAuth::parseToken()->authenticate();
            $this->UserService = new UserService($this->user);
        } catch (JWTException $e){
            return response()->json(['error' => 'Authentication failed'], 401);
        }

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
    public function getRanking () {
        return $this->UserService->getRanking();
    }
}
