<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/6 0006
 * Time: 10:34
 */
namespace app\admin\controller;
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
               $this->error("请登录后访问！","/admin/login/index");
         }
    }

    public function getAuthor(){
        return Session::get('authorid');
    }
}