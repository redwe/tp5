<?php
namespace app\user\controller;
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

                $uname = $list['uname'];
                $fid = $list['fid'];

                if($list){
                    Session::set('uname',$uname);
                    Session::set('authorid',$fid);
                    //dump($list);
                    $this->success('登录成功！','/user/main/index');
                    //header('Location: /user/main/index');
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
        $this->success('您已经成功退出！','/user/login/index');
    }
}