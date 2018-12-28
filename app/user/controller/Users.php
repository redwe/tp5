<?php
namespace app\user\controller;

use app\user\controller\Common;
use think\View;
use think\Request;
use think\Config;
use think\Db;
use app\user\model\User;
use think\Session;

class Users extends Common
{
    public function index()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }

    //修改密码
    public function password(){

        $view = new View();
        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        return $view->fetch();

    }

    public function dopassword(){

        $uid = Request::instance()->post("uid");
        $oldpass = Request::instance()->post("oldpass");
        $newpass = Request::instance()->post("newpass");
        $repass = Request::instance()->post("repass");

        if(empty($uid)){
            $this->error("请输入登录账号！");
        }
        if(empty($oldpass)){
            $this->error("请输入原密码！");
        }
        if(empty($newpass)){
            $this->error("请输入新密码！");
        }
        if($newpass != $repass){
            $this->error("两次输入的密码不一样，请确认！");
        }

        $where["uid"] = $uid;
        $where["pwd"] = $oldpass;
        $data["pwd"] = $newpass;

        $result = Db::name("users")->where($where)->update($data);

        if($result){
            $this->success('修改密码成功！');
        }
        else
        {
            $this->error("修改密码失败！");
        }

    }
}