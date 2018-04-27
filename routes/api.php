<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => "api"],function(){
    /*AllPageAPI*/
    Route::get('headdata'   ,"UsersController@getHeadData"          );
        /*this api is UserID & icon & point*/

    /*MyPageAPI*/
    Route::get('data'       ,"UsersController@getUserData"          );
        /*this api is gets icon & UserID*/
    Route::get('solvelist'  ,"ActlogController@getMySolveListData"  );
        /*this api is gets solveproblemid & problemname & problempoint*/
    Route::get('mypoint'    ,"ActlogController@getMySolvePoint"     );
        /*this api is gets SUMPoint & Rank & SolveCount*/

    /*Challenge(main)PageAPI*/
    Route::get('topproblems',"ProblemController@getTopProblemsData" );
        /*this api is gets SUMPoint & Rank & SUMSolve*/

    /*ProblemPageAPI*/
    Route::get('problem'    ,"ProblemController@getProblemData"     );
        /*this api is problemdata & is_solve & solveNoP
                                                        NoPは人数の事*/
    Route::post('flagsolve' ,"ProblemController@postFlagSolve"      );
        /*this api is post solve user icon */

    /*ProblemPageAPI*/
    Route::get('top10graph' ,"ActlogController@getTop10graphData"   );
        /*this api is gets top10graph 30ms*/
    Route::get('scores'     ,"ActlogController@getScoreData"        );
        /*this api is gets */

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
});
