<?php

namespace App\Service;

use JWTAuth;
use App\Model\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthServiceDigest
{
    private $user;
    private $userName;
    private $email;
    private $password;
    private $request;

    public function __construct (Request $request){
        $this->request = $request;
    }
    /*
    *   Preparation
    */

    public function registPreparation () {
        if(!$this->registValidated()){
            return false;
        }
        if(!$user = $this->userAccountRegist()){
            return false;
        }
        return $user;
    }

    public function loginPreparation () {
        if(!$this->loginValidated()){
            return false;
        }
        return true;
    }

    /*
    *   Authenticate
    */

    public function authenticate ()
    {
        // grab credentials from the request
        $credentials = $this->request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Authentication failed'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email', $this->request->email)->first();

        // all good so return the token
        return compact('user', 'token');
        //return view('app')->withHeaders(['Authorization'=>'Bearer '.$token]);
    }

    /*
    *   Validated
    */
    private function registValidated () {
        $validatedData = $this->request->validate([
            'email'             => 'required|string|email|max:255',
            'userName'          => 'required|string|max:255',
            'password'          => 'required|string|min:6|confirmed',
        ]);
        if(!$validatedData){
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        //同一名 同一Email確認
        $this->userName       = $this->request->userName;
        $this->email          = $this->request->email;
        $this->password       = $this->request->password;
        if(User::where('email',$this->email)->orwhere('name',$this->userName)->first()){
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        return true;
    }

    private function loginValidated () {
        $validatedData = $this->request->validate([
            'email'             => 'required|string|email|max:255',
            'password'          => 'required|string|min:6',
        ]);
        if(!$validatedData){
            return false;
        }
        return true;
    }

    /*
    *   userAccountRegist
    */
    private function userAccountRegist (){
        $this->user=
        User::create([
            'name'      =>  $this->userName,
            'email'     =>  $this->email,
            'password'  =>  bcrypt($this->password),
            'icon'      =>  '/icon/fast_icon.png',
            'icon_small'=>  '/icon/fast_icon_small.png',
        ]);
        return $this->user;
    }

}
