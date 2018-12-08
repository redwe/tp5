<?php
namespace app\admin\controller;
use think\View;
use app\admin\controller\Common;

class Index extends Common
{
    public function index()
    {
        $view = new View();
        return $view->fetch('index');
        //return view('index');
    }
}
