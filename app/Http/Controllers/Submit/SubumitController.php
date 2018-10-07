<?php

namespace App\Http\Controllers\Subumit;

use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use App\Service\SubumitService as SubumitService;


class SubumitController extends Controller
{
    private $user;
    private $SubumitService;

    public function __construct(Request $Request)
    {
        try {
            $this->user = JWTAuth::parseToken()->authenticate();
            $this->SubumitService = new SubumitService($this->user, $Request);
        } catch (JWTException $e){
            return response()->json(['error' => 'Authentication failed'], 401);
        }
    }

    public function postSubumit ($probId) {        //サブミット

        if ( $this->flagVerifi($probId) ) {
            return false;
        }

        //$this->tamperPrevention();
        $this->SubumitService->submit($probId);
        $this->regularly();

        return true ;
    }

    private function flagVerifi () {  //フラグ検証
        return $this->SubumitService->flagVerifi() ;
    }

    private function regularly () {         //ポイントの定期更新
        return $this->SubumitService->regularly() ;
    }

    private function tamperPrevention () {  //スコアサーバー改ざん防止(暫定)
        return $this->SubumitService->tamperPrevention() ;
    }


}
