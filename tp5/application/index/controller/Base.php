<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/8/15
 * Time: 9:06
 */

namespace app\index\controller;

use think\Controller;
use think\Session;

class Base extends Controller
{
    public function __construct()
    {
        $user_session = Session::get('user');
        if ($user_session) {
            echo "已经登录";
        } else {
            Index::loginView();
        }
        parent::__construct();
    }
}
