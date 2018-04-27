<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    public function getHeadData(Request $request){
        /*test cace*/
        $ret = json_encode(
            ['user_id' => $request->get('userID'),
             'icon_small'   => 'https://android.giveawayoftheday.com/wp-content/plugins/gotd_googleplay_plugin/images/2018/01/com.leomaz.flix_app_icon_1516879405.png',
             'point'  => 100]
        );
        return $ret;
    }

    public function getUserData(Request $request){
        /*test cace*/
        $ret=json_encode(
            ['user_id' => $request->get('userID'),
             'icon'   => 'https://android.giveawayoftheday.com/wp-content/plugins/gotd_googleplay_plugin/images/2018/01/com.leomaz.flix_app_icon_1516879405.png']
        );
        return $ret;
    }
}
