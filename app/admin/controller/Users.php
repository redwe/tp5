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
use think\Config;
use think\Db;
use app\admin\model\User;
use think\Session;

class Users extends Common
{
    public function index()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }
    //用户列表
    public function lists()
    {
        $nav = Request::instance()->get("nav");
        $menu = Request::instance()->get("menu");
        $view = new View();

        $where['u.status'] = 1;

        $province = Request::instance()->post("province");
        $department = Request::instance()->post("department");
        $keyword = Request::instance()->post("keyword");
        $view->assign('province',$province);
        $view->assign('department',$department);

        if(!empty($province)){
            $where['s.sheng'] = $province;
        }

        if(!empty($department)){
            $where['b.fenbu'] = $department;
        }

        if(!empty($keyword)){
            $where['u.uname'] = $keyword;
        }

        $shengobj = new User();
        $shengfen = $shengobj->getShengfen2("shengs","sheng");
        $view->assign('shenglist',$shengfen);

        $fenbu = $shengobj->getShengfen2("fenbus","fenbu");
        $view->assign('fenbulist',$fenbu);

        $shenfen = $shengobj->getShengfen2("shenfens","shenfen");
        $view->assign('shenfenlist',$shenfen);

        $gangwei = $shengobj->getShengfen2("gangweis","gangwei");
        $view->assign('gangweilist',$gangwei);

        $lists = $shengobj->getUserList($where,10);

        $view->assign('lists',$lists);
        $view->assign('nav',$nav);
        $view->assign('menu',$menu);
        $page = $lists->render();
        $view->assign('page', $page);
        return $view->fetch();
    }

    //编辑用户
    public function editpost(){

        $mid = Request::instance()->post("mid");
        $uid = Request::instance()->post("uid");
        $pwd = Request::instance()->post("pwd");
        $sid = Request::instance()->post("shengfen");
        $bid = Request::instance()->post("fenbu");
        $fid = Request::instance()->post("shenfen");
        $gid = Request::instance()->post("gangwei");

        $where["id"]=$mid;

        $data["uid"] = $uid;
        $data["pwd"] = $pwd;
        $data["sid"] = $sid;
        $data["bid"] = $bid;
        $data["fid"] = $fid;
        $data["gid"] = $gid;

        $result = Db::name("users")->where($where)->update($data);
        if($result){
            $this->success("保存成功！");
        }
        else
        {
            $this->error("保存失败！");
        }

    }

    //新建用户
    public function add()
    {
        //config('配置参数','配置值');
        $nav = Request::instance()->get("nav");

        $shengobj = new User();
        $shengfen = $shengobj->getShengfen("shengs","sheng");
        $fenbu = $shengobj->getShengfen("fenbus","fenbu");
        $shenfen = $shengobj->getShengfen("shenfens","shenfen");
        $gangwei = $shengobj->getShengfen("gangweis","gangwei");

        $view = new View();
        $view->assign('nav',$nav);

        $view->assign('shengfen',$shengfen[1]);
        $view->assign('fenbu',$fenbu[1]);
        $view->assign('shenfen',$shenfen[1]);
        $view->assign('gangwei',$gangwei[1]);

        $view->assign('sid',$shengfen[0]);
        $view->assign('bid',$fenbu[0]);
        $view->assign('fid',$shenfen[0]);
        $view->assign('gid',$gangwei[0]);

        return $view->fetch();
    }

    public function addpost(){

        $uname = Request::instance()->post("userName");
        $uid = Request::instance()->post("accNum");
        $pwd = Request::instance()->post("PWD");
        $sheng = Request::instance()->post("shengfen");
        $fenbu = Request::instance()->post("fenbu");
        $shenfen = Request::instance()->post("shenfen");
        $gangwei = Request::instance()->post("gangwei");


        if(empty($uname) || empty($uid) || empty($pwd)){
            $this->error("不能为空！");
        }
        else
        {
            $userinfo = Db::name("users")->where(["uname"=>$uname])->find();
            if(empty($userinfo["id"])){

                $shengobj = new User();
                $shengfen = $shengobj->getShengfen("shengs","sheng");
               if(!in_array($sheng,$shengfen[1])){
                    $sid = Db::name("shengs")->insertGetId(["sheng"=>$sheng]);
                }
                else
                {
                    $sid = $shengobj->getInsertid("shengs","sheng",$sheng);
                }
                $fenbus = $shengobj->getShengfen("fenbus","fenbu");
                if(!in_array($fenbu,$fenbus[1])){
                    $bid = Db::name("fenbus")->insertGetId(["fenbu"=>$fenbu]);
                }
                else
                {
                    $bid = $shengobj->getInsertid("fenbus","fenbu",$fenbu);
                }
                $shenfens = $shengobj->getShengfen("shenfens","shenfen");
                if(!in_array($shenfen,$shenfens[1])){
                    $fid = Db::name("shenfens")->insertGetId(["shenfen"=>$shenfen]);
                }
                else
                {
                    $fid = $shengobj->getInsertid("shenfens","shenfen",$shenfen);
                }

                $gangweis = $shengobj->getShengfen("gangweis","gangwei");
                if(!in_array($gangwei,$gangweis[1])){
                    $gid = Db::name("gangweis")->insertGetId(["gangwei"=>$gangwei]);
                }
                else
                {
                    $gid = $shengobj->getInsertid("gangweis","gangwei",$gangwei);
                }

                $date["uname"] = $uname;
                $date["uid"] = $uid;
                $date["pwd"] = $pwd;        //md5($pwd);
                $date["sid"] = $sid;
                $date["bid"] = $bid;
                $date["fid"] = $fid;
                $date["gid"] = $gid;
                $date["status"] = 1;
                $date["createtime"] = date("Y-m-d h:i:s",time());
                $fid = Db::name("users")->insertGetId($date);
                $this->success("添加成功！");
            }
            else
            {
                $this->error("不能重复添加！");
            }
        }
    }

    public function deluser(){

        $delid = Request::instance()->param("delid");
        $delsheng = Request::instance()->param("delsheng");
        $delfenbu = Request::instance()->param("delfenbu");
        $deluser = Request::instance()->param("deluser");

        $where["id"] = $delid;
        $data["status"] = 0;
        Db::name("users")->where($where)->update($data);

        $this->success("删除成功！");
    }

    public function getuserlist(){
        $delsheng = Request::instance()->param("dels");
        $delfenbu = Request::instance()->param("delf");

        $where["status"] = 1;

        if(!empty($delsheng)){
            $where["s.sheng"] = $delsheng;
        }
        if(!empty($delfenbu)) {
            $where["b.fenbu"] = $delfenbu;
        }

        $join = [
          ["shengs s","s.id=u.sid"],["fenbus b","b.id=u.bid"]
        ];
        $field = "u.uname,u.id";
        $result = Db::name("users")
            ->alias("u")
            ->join($join)
            ->field($field)
            ->where($where)
            ->select();
        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }

    public function isdelOr(){
        $sid = Request::instance()->post("sid");
        $id = Request::instance()->post("id");
        $shengobj = new User();
        $result = $shengobj->getIsuser($sid,$id);
        return $result;
    }


    public function deloption(){
        $table = Request::instance()->post("table");
        $id = Request::instance()->post("id");
        $shengobj = new User();
        $result = $shengobj->delTables($table,$id);
        return $result;
    }


    public function jilu()
    {
        $nav = Request::instance()->get("nav");
        $view = new View();
        $view->assign('nav',$nav);

        $where['d.status'] = 1;

        $province = Request::instance()->post("province");
        $department = Request::instance()->post("department");
        $keyword = Request::instance()->post("keyword");
        $view->assign('province',$province);
        $view->assign('department',$department);

        if(!empty($province)){
            $where['s.sheng'] = $province;
        }

        if(!empty($department)){
            $where['b.fenbu'] = $department;
        }

        if(!empty($keyword)){
            $where['u.uname'] = $keyword;
        }

        $shengobj = new User();
        $shengfen = $shengobj->getShengfen2("shengs","sheng");
        $view->assign('shenglist',$shengfen);

        $fenbu = $shengobj->getShengfen2("fenbus","fenbu");
        $view->assign('fenbulist',$fenbu);

        $lists = $shengobj->getSoundList($where,10);

        $view->assign('lists',$lists);
        $view->assign('nav',$nav);
        $page = $lists->render();
        $view->assign('page', $page);

        return $view->fetch();
    }

    public function shenpi()
    {
        $nav = Request::instance()->get("nav");
        $view = new View();
        $view->assign('nav',$nav);
        return $view->fetch();
    }

    //修改密码
    public function password(){

        $view = new View();
        return $view->fetch();

    }

    public function dopassword(){

        $uid = Request::instance()->post("uid");
        $oldpass = Request::instance()->post("oldpass");
        $newpass = Request::instance()->post("newpass");
        $repass = Request::instance()->post("repass");

        if(empty($uid)){
            $this->error("请输入登录账号！");
        }
        if(empty($oldpass)){
            $this->error("请输入原密码！");
        }
        if(empty($newpass)){
            $this->error("请输入新密码！");
        }
        if($newpass != $repass){
            $this->error("两次输入的密码不一样，请确认！");
        }

        $where["uid"] = $uid;
        $where["pwd"] = $oldpass;
        $data["pwd"] = $newpass;

        $result = Db::name("users")->where($where)->update($data);

        if($result){
            $this->success('修改密码成功！');
        }
        else
        {
            $this->error("修改密码失败！");
        }

    }
}