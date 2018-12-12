<?php
namespace app\user\controller;

use think\Controller;
use app\admin\model\User;
use think\View;
use think\Session;
use think\Db;

class Saler extends Common
{
    public function index()
    {
        $view = new View();
        return $view->fetch('index');
    }

    public function lingqu()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }

    public function mykehu()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }

    public function order()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }

    public function recycle()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }

}
