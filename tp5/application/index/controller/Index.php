<?php
namespace app\index\controller;

use think\Session;

class Index extends Base
{
    /**
     * 登录页
     *
     * @return string
     */
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }
    static function loginView()
    {
        echo "请先登录!";
    }
    /**
     *
     * 登录方法
     *
     * @return string
     */
    public function login()
    {
        //接收参数
        $info = input();
        $user_name = $info['user_name'];
        $password= $info['password'];
        //用用户名称匹配，最好使用账号登录，保证唯一性
        $user_info = db('user')->where(array('user_name'=>$user_name))->find();
        if ($user_info) {
            //匹配密码是否正确
            if (md5($password) == $user_info['password']) {
                //登陆成功存储用户信息session
                Session::set('user', $user_info);
                return "登录成功!";
            } else {
                return "密码错误!";
            }
        } else {
            return "用户不存在!";
        }
    }
}
