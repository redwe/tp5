<?php
namespace app\user\controller;

use think\Controller;
use app\user\model\User;
use think\View;
use think\Session;
use think\Db;
use think\Request;
use app\admin\model\Upload;

class Main extends Common
{

    public function index()
    {
        $view = new View();

        $shengobj = new User();
        $admin = Session::get('saler');
        $province = Session::get('province');
        if(empty($admin) || empty($province)){
            $this->error("请登录后访问！","/user/login/index");
        }

        $where["u.uname"] = $admin;
        $topusers = $shengobj->getUserList($where,1);

        $view->assign('topusers',$topusers);
        $view->assign('admin',$admin);

        $authorid = Session::get('authorid');
        $view->assign('authorid',$authorid);

            $userObj = new User();
            $list = $userObj->getUserList($where,1);
            $picurl = $list['picurl'];

        $view->assign('picurl',$picurl);

        return $view->fetch('index');
    }

    //修改密码
    public function password(){

        $view = new View();
        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        return $view->fetch();

    }

    public function dopassword()
    {

        $uid = Request::instance()->post("uid");
        $oldpass = Request::instance()->post("oldpass");
        $newpass = Request::instance()->post("newpass");
        $repass = Request::instance()->post("repass");

        if (empty($uid)) {
            $this->error("请输入登录账号！");
        }
        if (empty($oldpass)) {
            $this->error("请输入原密码！");
        }
        if (empty($newpass)) {
            $this->error("请输入新密码！");
        }
        if ($newpass != $repass) {
            $this->error("两次输入的密码不一样，请确认！");
        }

        $where["uid"] = $uid;
        $where["pwd"] = $oldpass;
        $data["pwd"] = $newpass;

        $result = Db::name("users")->where($where)->update($data);

        if ($result) {
            $this->success('修改密码成功！');
        } else {
            $this->error("修改密码失败！");
        }
    }

    public function uploadpic(){

        $params = Request::instance()->param();
        $uid = $params["uid"];

        $exps = array("jpg","jpeg","png","gif");

        $uploadData = new Upload();
        $upfile = $uploadData->uploadpic('file',"/uploads/",$exps);

        $code = $upfile['res'];
        $msg = $upfile['msg'];
        $uppath = $upfile['data'];

        if($code){
            $where["uname"]=$uid;
            $data["picurl"]=$uppath;
            $result = Db::name("users")->where($where)->update($data);
            if($result){
                $this->success("上传头像成功！");
            }
            else
            {
                $this->error("更新头像失败！");
            }
        }
        else
        {
            $this->error($msg);
        }

    }
}
