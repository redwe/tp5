<?php
namespace app\user\controller;

use think\Controller;
use think\Model;
use think\Session;
use think\View;

class Common extends Controller
{
    public function _initialize()
    {
        $islogin = Session::has('saler');
        $isauthor = Session::has('authorid');
        if(empty($islogin) || empty($isauthor)){
            //$this->error("请登录后访问！","/user/login/index");
            header('Location: /user/login/index');
        }
    }

    public function getAuthor(){
        return Session::get('authorid');
    }
}