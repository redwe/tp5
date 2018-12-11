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
            $uname = Request::instance()->post("uname");
            $password = Request::instance()->post("password");
            if(!empty($uname) && !empty($password)){
                ///dump($uname.$password);
                $where['uid'] = $uname;
                $where['pwd'] = $password;
                $list = Db::name("users")->where($where)->find();
                if($list["uname"]){
                    Session::set('uname',$list['uname']);
                    Session::set('authorid',$list['fid']);
                    $this->success('登录成功！','/admin/main/index');
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
        Session::delete('uname');
        $this->success('您已经成功退出！','/admin/login/index');
    }
}