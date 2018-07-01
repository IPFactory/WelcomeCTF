<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Service\AuthServiceDigest as AuthServiceDigest;

class AuthenticateController extends Controller
{
    private $AuthService;
    private $requestData;

    public function __construct (Request $request)
    {
        $this->requestData      = $request;
        $this->AuthService      = new AuthServiceDigest($request);
    }
    public function registInDigest ()
    {
        if (!$user   = $this->AuthService->userAccountRegist()) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        authenticate();
    }
    public function authenticateInTwitter ()
    {

    }
    public function authenticateInGithub ()
    {

    }
    public function authenticate ()
    {
        // grab credentials from the request
        $credentials = $this->requestData->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email', $this->requestData->email)->first();

        // all good so return the token
        return response()->json(compact('user', 'token'));
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
