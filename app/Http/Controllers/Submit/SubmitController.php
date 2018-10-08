<?php

namespace App\Http\Controllers\Submit;

use JWTAuth;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use App\Service\submitService as submitService;


class SubmitController extends Controller
{
    private $user;
    private $submitService;
    private $probId;

    public function __construct(Request $Request)
    {
        try {
            $this->user = JWTAuth::parseToken()->authenticate();
            $this->submitService = new submitService($this->user, $Request);
        } catch (JWTException $e){
            return response()->json(['error' => 'Authentication failed'], 401);
        } catch (Exception $e){
            return response()->json(['error' => 'Bad'], 400);

        }
    }

    public function postsubmit ($probId) {        //サブミット

        if ( !$this->flagVerifi($probId) ) {
            return response()->json(['error' => 'Bad request'], 400);
        }

        //$this->tamperPrevention();
        if ( !$this->submitService->submit($probId) ) {
            return response()->json(['error' => 'You submitted it earlier.'], 400);
        }

        $this->regularly($probId);

        return "true" ;
    }

    private function flagVerifi ($probId) {  //フラグ検証
        return $this->submitService->flagVerifi($probId) ;
    }

    private function regularly ($probId) {         //ポイントの定期更新
        return $this->submitService->regularly($probId) ;
    }

    private function tamperPrevention () {  //スコアサーバー改ざん防止(暫定)
        return $this->submitService->tamperPrevention() ;
    }


}
