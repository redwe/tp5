<?php
namespace app\user\controller;

use think\Controller;
use app\admin\model\User;
use think\View;
use think\Session;
use think\Db;
use think\Request;
use app\admin\model\XmModel;
use app\admin\model\ZyModel;

class Saler extends Common
{
    public function index()
    {
        $view = new View();
        return $view->fetch('index');
    }

    public function lingqu()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");
        $keyword = Request::instance()->post("keyword");

        $province = Request::instance()->post("province");
        $xueli = Request::instance()->post("xueli");
        $zhengshu = Request::instance()->post("zhengshu");

        $day_num = Request::instance()->post("day_num");

        $startY = Request::instance()->post("startY");
        $startM = Request::instance()->post("startM");
        $startD = Request::instance()->post("startD");

        $endY = Request::instance()->post("endY");
        $endM = Request::instance()->post("endM");
        $endD = Request::instance()->post("endD");

        $intent = Request::instance()->post("intent");

        $startTime = $startY.'-'.$startM.'-'.$startD;
        $endTime = $endY.'-'.$endM.'-'.$endD;

        $view = new View();
        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);

        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("kecheng","project",1);
        $view->assign('xmlist',$xmlist);

        $xmlist2 = $xmobj->getXmList("xueli","project",1);
        $view->assign('xmlist2',$xmlist2);

        $xmlist3 = $xmobj->getXmList("zhengshu","project",1);
        $view->assign('xmlist3',$xmlist3);

        $shengobj = new User();
        $shengfen = $shengobj->getShengfen2("shengs","sheng");
        $view->assign('shenglist',$shengfen);

        $limit = 10;

        $status = Request::instance()->param("hsz");
        if(!empty($status)){
            $status = 0;
        }
        else
        {
            $status = 1;
        }
        $where['status'] = $status;
        $where['uid'] = 0;

        $User_province = Session::get("province");
        $view->assign('province',$User_province);

        if(!empty($User_province)){
            $where["province"] = $User_province;
        }

        if(!empty($province)){
            $where["province"] = $province;
        }

        if(!empty($project)){
            $where['project'] = $project;
        }

        if(!empty($xueli)){
            $where['project'] = $xueli;
        }

        if(!empty($zhengshu)){
            $where['project'] = $zhengshu;
        }

        if(!empty($keyword)){
            $where['project'] = $keyword;
        }

        if(!empty($intent)){
            $where['intent'] = $intent;
        }

        if($startTime!=$endTime){
            $startTime = $startTime.' 00:00:00';
            $endTime = $endTime.' 23:59:59';
            $zylist = Db::name("resource")
                ->where($where)
                ->whereTime('datetime', 'between', [$startTime, $endTime])
                ->paginate($limit);
        }
        else if(!empty($day_num)){
            $zylist = Db::name("resource")
                ->where($where)
                ->whereTime('datetime','>','-'.$day_num.' days')
                ->paginate($limit);
        }
        else
        {
            $zylist = $xmobj->getResources($limit,$where);
        }
        $view->assign('zylist',$zylist);
        $view->assign('hsz',$status);
        $view->assign('project',$project);
        $view->assign('keyword',$keyword);

        $page = $zylist->render();
        $view->assign('page', $page);

        return $view->fetch();
    }

    public function dolingqu(){
        $id = Request::instance()->param("id");
        $uid = Session::get("uid");
        if(!empty($id)){
            $where["id"] = $id;
            $data["uid"] = $uid;
            $result = Db::name("resource")->where($where)->update($data);
            if($result){
                $this->success("领取成功!");
            }
            else{
                $this->error("领取失败！");
            }
        }
        else
        {
            $this->error("参数错误！");
        }
    }

    public function mykehu()
    {
        $intent = Request::instance()->post("intent");
        if(!empty($intent)){
            $where['intent'] = $intent;
        }
        $xmobj = new XmModel();
        $levels = $xmobj->getLevels();
        $view = new View();
        $view->assign('levels',$levels);
        $view->assign('intent',$intent);

        $uid = Session::get("uid");
        //$view->assign('uid',$uid);

        $limit = 10;
        $where['uid'] = $uid;
        $zylist = $xmobj->getResources($limit,$where);
        $view->assign('zylist',$zylist);

        $saler = Session::get('saler');
        $view->assign('saler',$saler);

        //dump($saler);

        return $view->fetch();
        //return view('index');
    }

    public function setlevel(){
        $levelid = Request::instance()->post("levelid");
        $level = Request::instance()->post("level");
        $where["id"] = $levelid;
        $data["intent"] = $level;
        $result = Db::name("resource")->where($where)->update($data);
        if($result){
            $this->success("设置成功!");
        }
        else
        {
            $this->error("删除失败!");
        }
    }

    public function del_guest(){
        $delid = Request::instance()->post("delid");
        $where["id"] = $delid;
        $data["uid"] = 0;
        $result = Db::name("resource")->where($where)->update($data);
        if($result){
            $this->success("设置成功!");
        }
        else
        {
            $this->error("操作失败!");
        }
    }

    public function sendmsg(){
        $message = Request::instance()->post("message");
        $email = Request::instance()->post("email");
        dump($message.$email);
        $this->success("短信发送成功!");
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

    public function delzy(){
        $id = Request::instance()->param("id");
        $limit = Request::instance()->param("limit");
        $ids = Request::instance()->param("ids/s");
        $status = Request::instance()->param("status","intval");
        //$ids = implode(",",$ids);
        $data["status"] = 0;
        $result = 0;
        //dump($ids);
        $where["status"] = 1;

        if(!empty($ids)){
            $where["id"] = ["in",$ids];
            $where2["pid"] = ["in",$ids];
        }
        if(!empty($id)) {
            $where["id"] = $id;
            $where2["pid"] = $id;
        }

        $where2['exam'] = 1;
        $res = Db::name("orders")->where($where2)->count();

        if($res>0){
            $this->error("审核过的记录不允许删除!");
        }
        else
        {
            if(empty($limit)) {
                $result = Db::name("resource")->where($where)->update($data);
            }
            else
            {
                $result = Db::name("resource")->where($where)->limit($limit)->order('id asc')->update($data);
            }
            if($result){
                $this->success("删除成功!");
            }
            else
            {
                $this->error("删除失败!");
            }
        }
    }

}
