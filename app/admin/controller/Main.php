<?php
namespace app\admin\controller;
use think\View;
use app\admin\controller\Common;
use app\admin\model\User;
use think\Session;
use think\Db;

class Main extends Common
{
    public function index()
    {
        $view = new View();

        $shengobj = new User();
        $admin = Session::get('uname');

        $where["uname"] = $admin;
        $topusers = $shengobj->getUserList($where,1);

        $view->assign('topusers',$topusers);
        $view->assign('admin',$admin);

        $authorid = Session::get('authorid');
        $view->assign('authorid',$authorid);

        return $view->fetch('index');
        //return view('index');
    }
}
