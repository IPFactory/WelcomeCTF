<?php

namespace App\Http\Controllers\Problem;

use JWTAuth;
use App\Model\User;
use App\Model\Problem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Service\ProblemService as ProblemService;


class ProblemController extends Controller
{
    private $user;
    private $ProblemService;
    private $id;

    public function __construct (Request $Request) {
        try {
            $this->user           =   JWTAuth::parseToken()->authenticate();
            $this->ProblemService =   new ProblemService($this->user->id, $Request);
        } catch (JWTException $e){
            return response()->json(['error' => 'Authentication failed'], 401);
        }
    }
    /*
    *   Control
    */
    public function getProblemInfo ($id) {
        return $this->ProblemService->getInfo($id);
    }

    public function getProblemList () {
        return $this->ProblemService->getList();
    }


}
