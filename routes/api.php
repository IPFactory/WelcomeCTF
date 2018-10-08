<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'],function(){
    Route::get('hoge',              'hoge@hoge');
    Route::get('user/info',         'User\\UserController@getUser');
    Route::get('user/raite',        'User\\UserController@getRatio');
    Route::get('user/list',         'User\\UserController@getList');
    Route::get('ranking',           'User\\UserController@getRanking');
    Route::get('problem/all',       'Problem\\ProblemController@getProblemList');
    Route::get('problem/info/{id}',      'Problem\\ProblemController@getProblemInfo');
    Route::get('problem/{cate}',    'Problem\\ProblemController@getProblemListCate');
    Route::post('submit/{probId}',  'Submit\\SubmitController@postSubmit');
    Route::post('regist/digest',    'Auth\\AuthenticateController@registInDigest');
    Route::post('login/twitter',    'Auth\\AuthenticateController@authenticateInTwitter');
    Route::post('login/github',     'Auth\\AuthenticateController@authenticateInTwitter');
    Route::post('login/digest',     'Auth\\AuthenticateController@loginInDigest');
    Route::get('logout',            'Auth\\AuthenticateController@logout')->middleware('jwt.refresh');
    Route::group(['middleware'=>'jwt.auth'],function () {
        Route::get('me',  'Auth\\AuthenticateController@getCurrentUser');
    });
});
//Route::get('login/{provider}',);
//Route::get();
