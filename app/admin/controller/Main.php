<?php
namespace app\admin\controller;
use think\View;
use app\admin\controller\Common;
use app\admin\model\User;
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
        $admin = Session::get('uname');
        $province = Session::get('province');

        if(empty($admin) || empty($province)){
            $this->error("请登录后访问！","/admin/login/index");
        }

        $where["uname"] = $admin;
        $topusers = $shengobj->getUserList($where,1);

        $view->assign('topusers',$topusers);
        $view->assign('admin',$admin);

        $authorid = Session::get('authorid');
        $view->assign('authorid',$authorid);

        $picurl = Session::get('picurl');

            $userObj = new User();
            $list = $userObj->getUserList($where,1);
            $picurl = $list['picurl'];

        if(strpos($picurl,"uploads")){
            $thumb_name = getThumbName($picurl);
        }
        else
        {
            $thumb_name = $picurl;
        }
        $view->assign('thumb_name',$thumb_name);
        $view->assign('picurl',$picurl);
        return $view->fetch('index');
        //return view('index');
    }

    public function welcome(){
        $view = new View();
        $uname = Session::get('uname');
        $view->assign('uname',$uname);
        return $view->fetch();
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
