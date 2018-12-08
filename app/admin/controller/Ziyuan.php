<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/6 0006
 * Time: 10:34
 */
namespace app\admin\controller;
use app\admin\controller\Common;
use think\View;
use think\Request;
use app\admin\model\XmModel;

class Ziyuan extends Common
{
    public function index()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }
    public function kecheng()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");

        $view = new View();
        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);

        $xmobj = new XmModel();

        $xmlist = $xmobj->getXmList("kecheng","project",1);
        $view->assign('xmlist',$xmlist);
        $view->assign('project',$project);
        return $view->fetch();
    }
    public function xueli()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");
        $view = new View();

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("xueli","project",1);
        $view->assign('xmlist',$xmlist);

        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);
        $view->assign('project',$project);
        return $view->fetch();
    }
    public function zhengshu()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");
        $view = new View();

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("zhengshu","project",1);
        $view->assign('xmlist',$xmlist);

        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);
        $view->assign('project',$project);
        return $view->fetch();
    }
}