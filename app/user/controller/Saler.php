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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use app\user\model\Sendmail;
use app\admin\model\Upload;

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

        $where['status'] = 1;
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
        $uid = Session::get("uid");
        $view->assign('uid',$uid);
        $levels = $xmobj->getLevels($uid);

        $view->assign('levels',$levels);

        $view->assign('zylist',$zylist);
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
        $view = new View();

        $uid = Session::get("uid");
        $view->assign('uid',$uid);

        $xmobj = new XmModel();
        $levels = $xmobj->getLevels($uid);

        $view->assign('levels',$levels);
        $view->assign('intent',$intent);

        $limit = 10;
        $where['uid'] = $uid;
        $where['status'] = 1;
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
            $this->error("设置失败!");
         }
    }

    public function saveclass(){
        $intent = Request::instance()->param("intent");
        $data['level'] = $intent;
        $uid = Session::get("uid");
        $data['uid'] = $uid;
        $data['status'] = 1;

        if(!empty($intent)){
            $res = Db::name("levels")->where($data)->find();
            if($res['id']){
                $this->error("该选项已经存在!");
            }
            else
            {
                $result = Db::name("levels")->insert($data);
                if($result){
                   $this->success("设置成功!");
                }
                else
                {
                   $this->error("设置失败!");
                }
             }
        }
        else
        {
            $this->error("参数不能为空!");
        }
    }

    public function is_del(){
        $id = Request::instance()->param("id");
        $where["status"] = 1;
        $result = Db::name("levels")->where($where)->find();
        return $result;
    }

    public function del_lv(){
        $delid = Request::instance()->param("id");
        $where["id"] = $delid;
        $data["status"] = 0;
        $result = Db::name("levels")->where($where)->update($data);
        if($result){
            $this->success("删除成功!");
        }
        else
        {
            $this->error("操作失败!");
        }
    }

    public function del_guest(){
        $delid = Request::instance()->post("delid");
        $uid = Request::instance()->post("uid");
        $where["id"] = $delid;
        $where["uid"] = $uid;
        $data["status"] = 0;
        $result = Db::name("resource")->where($where)->update($data);
        if($result){
            $this->success("删除成功!");
        }
        else
        {
            $this->error("操作失败!");
        }
    }

    public function sendmsg(){
        $message = Request::instance()->post("message");
        $email = Request::instance()->post("email");
        //dump($message.$email);
        $uploadData = new Upload();
        $result = $uploadData->sendMsg($email,$message);
        if($result){
            $this->success("发送成功!");
        }
        else
        {
            $this->error("发送失败!");
        }
    }

    public function sendmsg_mail(){
        $message = Request::instance()->post("message");
        $email = Request::instance()->post("email");
        //dump($message.$email);

        $nickname = '奥创百科';
        $from = 'zkzhw1018@126.com';
        $password = '';
        $getname = '收件人';
        $to = '18364120@qq.com';
        $subject = '发送邮件测试标题';
        $content = '邮件内容测试';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $from;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $from;                 // SMTP username
            $mail->Password = $password;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //设置收件人
            $mail->setFrom($from, $nickname);
            $mail->addAddress($to, $getname);     // Add a recipient

            //添加附件
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;

            $mail->send();
            $this->success("短信发送成功!");
        } catch (Exception $e) {
            $this->error("发送失败!");
        }

    }

    public function order()
    {
        $keyword = Request::instance()->post("keyword");

        $where["o.status"]=["<",2];
        $limit = 10;

        if(!empty($keyword)){
            $where['project'] = $keyword;
        }
        $join = [
            ["resource r","r.id=o.pid"],["users u","o.uid=u.id"]
        ];
        $field = "o.*,r.project,r.province,r.city,r.guest,r.intent,r.label,o.exam";
        $orderlist = Db::name("orders")
            ->alias("o")
            ->join($join)
            ->where($where)
            ->paginate($limit);

        $view = new View();
        $page = $orderlist->render();
        $view->assign('page', $page);
        $view->assign('orderlist', $orderlist);
        return $view->fetch();
        //return view('index');
    }

    public function recycle()
    {
        $intent = Request::instance()->post("intent");
        if(!empty($intent)){
            $where['intent'] = $intent;
        }
        $view = new View();
        $uid = Session::get("uid");
        $view->assign('uid',$uid);

        $xmobj = new XmModel();
        $levels = $xmobj->getLevels($uid);

        $view->assign('levels',$levels);
        $view->assign('intent',$intent);

        $limit = 10;
        $where['uid'] = $uid;
        $where['status'] = 0;
        $zylist = $xmobj->getResources($limit,$where);
        $view->assign('zylist',$zylist);

        $saler = Session::get('saler');
        $view->assign('saler',$saler);
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


    public function lingzy(){
        $id = Request::instance()->param("id");
        $limit = Request::instance()->param("limit");
        $ids = Request::instance()->param("ids/s");
        $status = Request::instance()->param("status","intval");
        $uid = Session::get("uid");
        //$ids = implode(",",$ids);
        $data["uid"] = $uid;
        $result = 0;
        //dump($ids);
        $where["uid"] = 0;

        if(!empty($ids)){
            $where["id"] = ["in",$ids];
            $where2["pid"] = ["in",$ids];
        }

            if(empty($limit)) {
                $result = Db::name("resource")->where($where)->update($data);
            }
            else
            {
                $result = Db::name("resource")->where($where)->limit($limit)->order('id asc')->update($data);
            }
            if($result){
                $this->success("领取成功!");
            }
            else
            {
                $this->error("领取失败!");
            }
    }


    public function importExcel(){

        //port('PHPExcel', EXTEND_PATH);
        $rootUrl = $_SERVER['DOCUMENT_ROOT'];
        $params = Request::instance()->param();
        $zytype = $params["zytype"];

        $exps = array("xls","xlsx");

        $uploadData = new Upload();
        $upfile = $uploadData->uploadpic('excel',"/uploads/",$exps);

        $code = $upfile['res'];
        $msg = $upfile['msg'];
        $path = $upfile['data'];
        $path = $rootUrl.$path;

        $uid = Session::get("uid");

        if($code){
            $zytype = 'kecheng';
            $ret = $uploadData->importExcels($path,$zytype,$uid);
            $this->success($ret["msg"]);

        } else {
            $this->error($msg);
        }

    }


    public function restore(){
        $id = Request::instance()->param("id");
        $uid = Session::get("uid");
        $data["status"] = 1;
        $where["status"] = 0;
        if(!empty($id)) {
            $where["id"] = $id;
            $where["uid"] = $uid;
            $result = Db::name("resource")->where($where)->update($data);
            if($result){
                $this->success("还原成功!");
            }
            else
            {
                $this->error("操作失败!");
            }
        }
        else
        {
            $this->error("参数错误!");
        }
    }

    public function del(){
        $id = Request::instance()->param("delid");
        $limit = Request::instance()->param("limit");
        $ids = Request::instance()->param("ids/s");
        //dump($ids);
        $result = 0;
        $where["status"] = 0;
        if(!empty($ids)){
            $where["id"] = ["in",$ids];
        }
        if(!empty($id)) {
            $where["id"] = $id;
        }
        if(empty($limit)) {
            $result = Db::name("resource")->where($where)->delete();
        }
        else
        {
            $result = Db::name("resource")->limit($limit)->order('id asc')->where($where)->delete();
        }
        if($result){
            $this->success("删除成功!");
        }
        else
        {
            $this->error("操作失败!");
        }
    }

}
