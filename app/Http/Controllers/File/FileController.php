<?php

namespace App\Http\Controllers\File;

use JWTAuth;
use Storage;
use App\Model\User;
use App\Model\Problem;
use App\Model\ProblemFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Service\ProblemService as ProblemService;


class FileController extends Controller
{
    private $user;
    private $request;
    private $id;

    public function __construct (Request $Request) {
        try {
            $this->user           =   JWTAuth::parseToken()->authenticate();
            $this->request       =    $Request;
        } catch (JWTException $e){
            return response()->json(['error' => 'Authentication failed'], 401);
        }
    }
    /*
    *   Control
    */
    public function getProblemFile ($file_name ) {

        $find = ProblemFile::where('first_data', $file_name)
                ->orWhere('second_data', $file_name)
                ->get();

        if( !isset($file_name) || !isset($find[0]->id) ){

            return redirect("/main");
            
        }

        return Storage::disk('s3')->download("ctffiles/".$file_name);

    }
}
