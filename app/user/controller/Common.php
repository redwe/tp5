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
        $islogin = Session::has('uname');
        $isauthor = Session::has('authorid');
        if(!$islogin || !$isauthor){
            //$this->error("请登录后访问！","/admin/login/index");
            header('Location: /admin/login/index');
        }
    }

    public function getAuthor(){
        return Session::get('authorid');
    }
}