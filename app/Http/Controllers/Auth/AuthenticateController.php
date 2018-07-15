<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use Illuminate\Http\Request;

use App\Model\User as User;
use App\Http\Controllers\Controller;
use App\Service\AuthServiceDigest as AuthServiceDigest;

class AuthenticateController extends Controller
{
    private $AuthService;

    public function __construct (Request $request) {
        $this->AuthService = new AuthServiceDigest($request);
    }

    public function registInDigest ()
    {
        if (!$user = $this->AuthService->registPreparation()) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        $token = $this->AuthService->authenticate();
        return response()->json($token);
    }

    public function loginInDigest ()
    {
        if (!$user = $this->AuthService->loginPreparation()) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        $token = $this->AuthService->authenticate();
        return response()->json($token);
    }

    public function authenticateInTwitter ()
    {
        //TODO twitterソーシャルログインの実装
    }
    public function authenticateInGithub ()
    {
        //TODO githubソーシャルログインの実装
    }


    public function getCurrentUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json(compact('user'));
    }

    public function logout()
    {
    }


}
