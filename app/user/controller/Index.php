<?php
namespace app\user\controller;

use think\Controller;
use app\user\model\User;
use think\View;
use think\Session;
use think\Db;

class Index extends Common
{
    public function index()
    {
        $view = new View();
        return $view->fetch('index');
    }

    public function main()
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
