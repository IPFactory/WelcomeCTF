<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use App\Model\User as User;
class AuthServiceDigest extends User
{
    private $name;
    private $user;
    private $email;
    private $password;

    public function __construct ($request) {
        $validatedData = $request->validate([
            'email'             => 'bail|required|string|email|max:255|unique:users',
            'name'              => 'required|string|max:255',
            'password'          => 'required|string|min:6|confirmed',
        ]);
        $this->email          = $request->email;
        $this->password       = $request->password;
    }

    public function userAccountRegist (){
        $this->user=
        User::create([
            'name'      =>  $this->name,
            'email'     =>  $this->email,
            'password'  =>  $this->password,
            'icon'      =>  '/icon/fast_icon.png',
            'icon_small'=>  '/icon/fast_icon_small.png',
        ]);
        return $this->user;
    }
}
