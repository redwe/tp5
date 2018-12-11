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
use think\Db;
use app\admin\model\XmModel;

class Xiangmu extends Common
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
        $nav2 = Request::instance()->get("nav2");
        $view = new View();
        $view->assign('nav2',$nav2);
        $view->assign('menu',$menu);

        $xmobj = new XmModel();

        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        $xmlist = $xmobj->getXmList("kecheng","project",1);
        $view->assign('xmlist',$xmlist);
        $prolist = $xmobj->getXmList("kecheng","ptype",1);
        $view->assign('prolist',$prolist);
        $schlist = $xmobj->getXmList("kecheng","school",1);
        $view->assign('schlist',$schlist);

        return $view->fetch();
    }
    public function xueli()
    {
        $nav2 = Request::instance()->get("nav2");
        $view = new View();
        $view->assign('nav2',$nav2);

        $xmobj = new XmModel();

        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        $xmlist = $xmobj->getXmList("xueli","project",1);
        $view->assign('xmlist',$xmlist);
        $prolist = $xmobj->getXmList("xueli","ptype",1);
        $view->assign('prolist',$prolist);
        $schlist = $xmobj->getXmList("xueli","school",1);
        $view->assign('schlist',$schlist);

        return $view->fetch();
    }

    public function zhengshu()
    {
        $nav2 = Request::instance()->get("nav2");
        $view = new View();
        $view->assign('nav2',$nav2);

        $xmobj = new XmModel();

        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        $xmlist = $xmobj->getXmList("zhengshu","project",1);
        $view->assign('xmlist',$xmlist);
        $prolist = $xmobj->getXmList("zhengshu","ptype",1);
        $view->assign('prolist',$prolist);
        $schlist = $xmobj->getXmList("zhengshu","school",1);
        $view->assign('schlist',$schlist);

        return $view->fetch();
    }

    public function addpro(){

        $addpro = Request::instance()->param("addpro");
        $class = Request::instance()->param("class");
        $addinput = Request::instance()->param("addinput");

        $data["project"] = $addinput;
        $data["ptype"] = $addpro;
        $data["class"] = $class;
        $data["status"] = 1;

        $result = Db::name("projects")->insert($data);
        if($result){
            $this->success($addinput." 添加成功！");
        }
        else
        {
            $this->error("保存失败！");
        }
    }

    public function isdelOr(){
        $id = Request::instance()->post("id");
        $pname = Request::instance()->post("pname");
        $where["status"] = 1;
        $where["project"] = $pname;
        $result = Db::name("resource")->where($where)->find();
        return $result;
    }

    public function del_pro(){
        $id = Request::instance()->post("id");
        $where["id"] = $id;
        $data["status"] = 0;
        $result = Db::name("projects")->where($where)->update($data);
        return $result;
        //$this->success(" 删除成功！");
    }
}