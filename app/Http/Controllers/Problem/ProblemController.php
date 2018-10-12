<?php

namespace App\Http\Controllers\Problem;

use JWTAuth;
use App\Model\User;
use App\Model\Problem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
        } catch (JWTException $e){
            return response()->json(['error' => 'Authentication failed'], 401);
        }
        $this->ProblemService =   new ProblemService($this->user->id, $Request);
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

    public function getProblemListCate ($cate) {
        return $this->ProblemService->getListCate($cate);
    }

    private function setting () {
        $start_date = new Carbon('2018-10-11 09:00:00');//$_ENV['CTF_START_DATE']);
        $now_date   = Carbon::now();;
        if ( $start_date->gte($now_date) ) {
            return response()->json(['error' => 'Do Not CTF Started'], 412);
        }

    }

}
