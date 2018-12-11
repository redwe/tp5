<?php
namespace app\admin\controller;
use think\View;
use think\Request;
use app\admin\controller\Common;
use app\admin\model\User;
use think\Session;
use think\Db;

class Roles extends Common
{
    //添加角色
    public function add_role()
    {
        $view = new View();
        $id = Request::instance()->param("id");

        if(!empty($id)){
            $title = "编辑";
            $where2["id"] = $id;
            $list = Db::name("shenfens")->where($where2)->find();
        }
        else
        {
            $title = "添加";
            $list = [
                "shenfen" => '',
                "id" => 0
            ];
        }

        $where["status"] = 1;
        //$where["id"] = [">",1];
        $lists = Db::name("shenfens")->where($where)->select();
        $view->assign('lists',$lists);
        $view->assign('list',$list);
        $view->assign('title',$title);
        return $view->fetch();
        //return view('index');
    }

    public function save_role(){

        $r_name = Request::instance()->post("r_name");
        if(empty($r_name)){
            $this->error("请输入角色名！");
        }

        $data["shenfen"] = $r_name;
        $data["status"] = 1;

        $where["shenfen"] = $r_name;

        $roles = Db::name("shenfens")->where($where)->find();
        if($roles["shenfen"]){
            $this->error("记录已经存在，请不要重复添加！");
        }
        else
        {
            $id = Request::instance()->param("id");
            if(empty($id)){
                $result = Db::name("shenfens")->insert($data);
            }
            else
            {
                $where = ["id"=>$id];
                $result = Db::name("shenfens")->where($where)->update($data);
            }

            if($result){
                $this->success('保存角色成功！');
            }
            else
            {
                $this->error("保存失败！");
            }
        }
    }

    public function author(){
        $view = new View();
        $rid = Request::instance()->param("rid");

        $where["status"] = 1;
        $where["levels"] = 0;
        $sublist = [];

        $shenfen = Db::name("shenfens")->where(['id'=>$rid])->find();
        $sf = $shenfen['shenfen'];
        $view->assign('sf',$sf);

        $author = Db::name("author")->where(['uid'=>$rid])->select();
        $aids = [];
        foreach($author as $vo)
        {
            array_push($aids,$vo['aid']);
        }
        $view->assign('aids',$aids);
        $lists = Db::name("menus")->where($where)->select();

        foreach($lists as $vo){
            $id = $vo["id"];
            $where2["levels"] = $id;
            $lists2 = Db::name("menus")->where($where2)->select();
            $sublist[$id] = $lists2;
        }
        $view->assign('rid',$rid);
        $view->assign('lists',$lists);
        $view->assign('sublist',$sublist);

        return $view->fetch();
    }

    public function save_auth(){
        $view = new View();
        $rid = Request::instance()->param("rid");
        $ids = Request::instance()->param("ids");
        if(!empty($ids)){
            if(strpos($ids,",")){
                $id_array = explode(",",$ids);
            }
            else
            {
                $id_array = [$ids];
            }
            $where2["uid"] = $rid;
            $result = Db::name("author")->where($where2)->delete();
            //dump($id_array);
            foreach($id_array as $vid){

                $where['id'] = $vid;
                $menus = Db::name("menus")->where($where)->find();
                $aid = $menus["id"];
                $mname = $menus["m_name"];
                $models = $menus["m_model"];
                $ctrls = $menus["m_ctrl"];
                $method = $menus["m_method"];

                $urls = "/".$models.'/'.$ctrls.'/'.$method;

                    $data["aid"] = $aid;
                    $data["uid"] = $rid;
                    $data["menu"] = $mname;
                    $data["urls"] = $urls;
                    $data["status"] = 1;

                    Db::name("author")->insert($data);
            }
            $this->success('设置成功！');
        }
        else
        {
            $this->error("参数错误！");
        }

    }

    public function del(){
        $id = Request::instance()->param("id");
        $where["id"] = $id;
        $data["status"] = 0;
        $lists = Db::name("shenfens")->where($where)->update($data);
        if($lists){
            $this->success('删除成功！');
        }
        else
        {
            $this->error("删除失败！");
        }
    }
}
