<?php
namespace app\admin\controller;
use think\View;
use think\Request;
use app\admin\controller\Common;
use app\admin\model\User;
use think\Session;
use think\Db;

class Menus extends Common
{

    public function lists(){
        $view = new View();
        $where["status"] = 1;
        $where["levels"] = 0;
        $sublist = [];
        $lists = Db::name("menus")->where($where)->select();
        foreach($lists as $vo){
            $id = $vo["id"];
            $where2["levels"] = $id;
            $lists2 = Db::name("menus")->where($where2)->select();
            $sublist[$id] = $lists2;
        }
        $view->assign('lists',$lists);
        $view->assign('sublist',$sublist);
        //dump($sublist);
        return $view->fetch();
    }

    public function add()
    {
        $view = new View();
        $where["levels"] = 0;
        $lists = Db::name("menus")->where($where)->select();
        $view->assign('lists',$lists);
        return $view->fetch();
        //return view('index');
    }

    public function save_menus(){

        $m_name = Request::instance()->post("m_name");
        $m_model = Request::instance()->post("m_model");
        $m_ctrl = Request::instance()->post("m_ctrl");
        $m_method = Request::instance()->post("m_method");
        $m_param = Request::instance()->post("m_param");
        $m_icon = Request::instance()->post("m_icon");
        $levels = Request::instance()->post("levels");

        if(empty($m_name)){
            $this->error("请输入菜单名！");
        }
        if(empty($m_model)){
            $this->error("请输入模块名！");
        }
        if(empty($m_ctrl)){
            $this->error("请输入控制器名！");
        }
        if(empty($m_method)){
            $this->error("请输入方法名！");
        }

        $data["m_name"] = $m_name;
        $data["m_model"] = $m_model;
        $data["m_ctrl"] = $m_ctrl;

        $data["m_method"] = $m_method;
        $data["m_param"] = $m_param;
        $data["m_icon"] = $m_icon;

        $data["levels"] = $levels;
        $data["status"] = 1;

        $where["m_model"] = $m_model;
        $where["m_ctrl"] = $m_ctrl;
        $where["m_method"] = $m_method;
        $where["levels"] = $levels;
        $where["m_param"] = $m_param;

        $menus = Db::name("menus")->where($where)->find();
        if($menus["m_name"]){
            $this->error("记录已经存在，请不要重复添加！");
        }
        else
        {
            $result = Db::name("menus")->insert($data);

            if($result){
                $this->success('保存菜单成功！');
            }
            else
            {
                $this->error("保存失败！");
            }
        }
    }

    public function edit(){

        $view = new View();

        $where["levels"] = 0;
        $lists = Db::name("menus")->where($where)->select();

        $id = Request::instance()->param("id");
        $where2["id"] = $id;

        $menus = Db::name("menus")->where($where2)->find();

        $view->assign('menus',$menus);
        $view->assign('lists',$lists);

        return $view->fetch();

    }

    public function editPost(){

        $id = Request::instance()->post("mid");
        $m_name = Request::instance()->post("m_name");
        $m_model = Request::instance()->post("m_model");
        $m_ctrl = Request::instance()->post("m_ctrl");
        $m_method = Request::instance()->post("m_method");
        $m_param = Request::instance()->post("m_param");
        $m_icon = Request::instance()->post("m_icon");
        $levels = Request::instance()->post("levels");

        $data["m_name"] = $m_name;
        $data["m_model"] = $m_model;
        $data["m_ctrl"] = $m_ctrl;

        $data["m_method"] = $m_method;
        $data["m_param"] = $m_param;
        $data["m_icon"] = $m_icon;

        $data["levels"] = $levels;

        $where["id"] = $id;

        $lists = Db::name("menus")->where($where)->update($data);
        if($lists){
            $this->success('编辑菜单成功！');
        }
        else
        {
            $this->error("编辑失败！");
        }

    }

    public function del(){
        $id = Request::instance()->param("id");
        $where["id"] = $id;
        $data["status"] = 0;
        $lists = Db::name("menus")->where($where)->update($data);
        if($lists){
            $this->success('删除菜单成功！');
        }
        else
        {
            $this->error("删除失败！");
        }
    }
}
