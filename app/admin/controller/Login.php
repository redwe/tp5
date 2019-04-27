<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/6 0006
 * Time: 10:34
 */
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\User;

class Login extends Controller
{
    public function index()
    {
        $view = new View();
        return $view->fetch();
        //return view('index');
    }
    public function dologin()
    {
        if (Request::instance()->isPost()){
            //$request = request();
            $uid = Request::instance()->post("uname");
            $password = Request::instance()->post("password");

            if(!empty($uid) && !empty($password)){

                $where['u.uid'] = $uid;
                $where['u.pwd'] = $password;
                //$where['u.status'] = 1;
                $userObj = new User();
                $list = $userObj->checkUser($where);

                //dump(Db::name("users")->getLastSql());
                if(!empty($list)){
                    $uname = $list['uname'];
                    $sid = $list['sid'];
                    $fid = $list['fid'];
                    $status = $list['status'];
                    $picurl = $list['picurl'];

                    if($status==0){
                        $this->error('该用户已经被禁用，请与管理员联系！');
                    }
                    else if($fid<2){
                        $this->error('权限不足，无法登陆！');
                    }
                    else
                    {
                        $res = Db::name("shengs")->where(array("id"=>$sid))->find();
                        $province = $res['sheng'];
                        Session::set('uname',$uname);
                        Session::set('authorid',$fid);
                        Session::set('province',$province);
                        Session::set('picurl',$picurl);
                        $this->success('登录成功！','/admin/main/index');
                        //header('Location: /admin/main/index');
                    }
                }
                else
                {
                    $this->error('登录名或密码错误！');
                }
            }
            else
            {
                $this->error('请输入登录名和密码！');
                //return '请输入登录名和密码！';
            }
        }
        else{
            $this->error('参数错误！');
            //return '参数错误！';
        }

    }

    public function logout(){
        Session::delete('saler');
        Session::delete('province');
        $this->success('您已经成功退出！','/admin');
    }
}