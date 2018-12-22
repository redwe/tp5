<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/6 0006
 * Time: 10:34
 */
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Session;
use think\View;
use think\Request;
use think\Db;
use app\admin\model\XmModel;
use app\admin\model\ZyModel;
use PHPExcel;
use app\admin\model\Upload;

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
        $keyword = Request::instance()->post("keyword");

        $view = new View();
        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);

        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("kecheng","project",1);
        $view->assign('xmlist',$xmlist);

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
        $where['zytype'] = "kecheng";

        $User_province = Session::get("province");
        $view->assign('User_province',$User_province);

        if(!empty($User_province) && $authorid != 3){
            $where["province"] = $User_province;
        }

        if(!empty($project)){
            $where['project'] = $project;
        }

        if(!empty($keyword)){
            $where['project'] = $keyword;
        }

        $zylist = $xmobj->getResources($limit,$where);
        $view->assign('zylist',$zylist);
        $view->assign('hsz',$status);
        $view->assign('project',$project);
        $view->assign('keyword',$keyword);

        $page = $zylist->render();
        $view->assign('page', $page);

        return $view->fetch();
    }
    public function xueli()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");
        $keyword = Request::instance()->post("keyword");
        $view = new View();

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("xueli","project",1);
        $view->assign('xmlist',$xmlist);

        $limit = 10;

        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);

        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        $User_province = Session::get("province");
        $view->assign('User_province',$User_province);

        if(!empty($User_province) && $authorid != 3){
            $where["province"] = $User_province;
        }

        $status = Request::instance()->param("hsz");
        if(!empty($status)){
            $status = 0;
        }
        else
        {
            $status = 1;
        }
        $where['status'] = $status;
        $where['zytype'] = "xueli";

        if(!empty($project)){
            $where['project'] = $project;
        }

        if(!empty($keyword)){
            $where['project'] = $keyword;
        }

        $zylist = $xmobj->getResources($limit,$where);
        $view->assign('zylist',$zylist);
        $view->assign('hsz',$status);

        $view->assign('project',$project);
        $view->assign('keyword',$keyword);

        $page = $zylist->render();
        $view->assign('page', $page);

        return $view->fetch();
    }
    public function zhengshu()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");
        $keyword = Request::instance()->post("keyword");
        $view = new View();

        $limit = 10;

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("zhengshu","project",1);
        $view->assign('xmlist',$xmlist);

        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);

        $authorid = $this->getAuthor();
        $view->assign('authorid',$authorid);

        $User_province = Session::get("province");
        $view->assign('User_province',$User_province);

        if(!empty($User_province) && $authorid != 3){
            $where["province"] = $User_province;
        }

        $status = Request::instance()->param("hsz");
        if(!empty($status)){
            $status = 0;
        }
        else
        {
            $status = 1;
        }
        $where['status'] = $status;
        $where['zytype'] = "zhengshu";

        if(!empty($project)){
            $where['project'] = $project;
        }

        if(!empty($keyword)){
            $where['project'] = $keyword;
        }

        $zylist = $xmobj->getResources($limit,$where);
        $view->assign('zylist',$zylist);
        $view->assign('hsz',$status);

        $view->assign('project',$project);
        $view->assign('keyword',$keyword);

        $page = $zylist->render();
        $view->assign('page', $page);

        return $view->fetch();
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

        if($code){

            $zyObject = new ZyModel();
            $objPHPExcel = new \PHPExcel();

            //文件的扩展名
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            if ($ext == 'xlsx') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                $objPHPExcel = $objReader->load($path, 'utf-8');
            } elseif ($ext == 'xls') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($path, 'utf-8');
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow(); // 取得总行数
            $highestColumn = $sheet->getHighestColumn(); // 取得总列数
            $ar = array();
            $i = 0;
            $importRows = 0;
            for ($j = 2; $j <= $highestRow; $j++) {
                $importRows++;
                $datas['guest'] = (string)$objPHPExcel->getActiveSheet()->getCell("A$j")->getValue();   //需要导入的客户名称
                $datas['tel'] = (string)$objPHPExcel->getActiveSheet()->getCell("B$j")->getValue();   //需要导入的客户手机
                $datas['company'] = (string)$objPHPExcel->getActiveSheet()->getCell("C$j")->getValue();   //需要导入的客户单位
                $datas['project'] = (string)$objPHPExcel->getActiveSheet()->getCell("D$j")->getValue();//需要导入的项目名
                //$datas['profes'] = (string)$objPHPExcel->getActiveSheet()->getCell("E$j")->getValue();//需要导入的专业
                //$datas['class'] = (string)$objPHPExcel->getActiveSheet()->getCell("F$j")->getValue();//需要导入的科目
                //$datas['email'] = (string)$objPHPExcel->getActiveSheet()->getCell("G$j")->getValue();//需要导入的邮箱
                $datas['province'] = (string)$objPHPExcel->getActiveSheet()->getCell("E$j")->getValue();   //需要导入的省份
                $datas['city'] = (string)$objPHPExcel->getActiveSheet()->getCell("F$j")->getValue(); //需要导入的城市
                //$create = (string)$objPHPExcel->getActiveSheet()->getCell("J$j")->getValue();     //需要导入的时间
                //$datas['create'] = $zyObject->getTimeFormat($create);
                $datas['intent'] = (string)$objPHPExcel->getActiveSheet()->getCell("G$j")->getValue();   //需要导入的意向
                $datas['label'] = (string)$objPHPExcel->getActiveSheet()->getCell("H$j")->getValue();   //需要导入的标签
                $datas['marks'] = (string)$objPHPExcel->getActiveSheet()->getCell("I$j")->getValue();   //需要导入的备注
                $datas['datetime'] = date("Y-m-d h:i:s",time());
                $datas['status'] = 1;
                $datas['uid'] = 0;
                $datas['zytype'] = $zytype;

                if(!empty($datas['project'])){
                    $ret['mdata'] = $zyObject->addZiyuan($datas);   //保存到mysql数据库
                    if ($ret['mdata'] && !is_Bool($ret['mdata'])) {
                        $ar[$i] = $ret['mdata'];
                        $i++;
                    }
                }
            }
            if ($i > 0) {
                $ret['res'] = "0";
                $ret['errNum'] = $i;
                $ret['allNum'] = $importRows;
                $ret['sucNum'] = $importRows - $i;
                $ret['mdata'] = $ar;
                $ret['msg'] = "导入完毕!";
            }
            $ret['res'] = "1";
            $ret['allNum'] = $importRows;
            $ret['errNum'] = 0;
            $ret['sucNum'] = $importRows;
            $ret['mdata'] = "导入成功!";
            $this->success("导入成功！");

        } else {
            $this->error($msg);
        }

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
            }
            if(!empty($id)) {
                $where["id"] = $id;
            }
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

    public function restore(){
        $id = Request::instance()->param("id");
        $data["status"] = 1;
        $result = 0;
        $where["status"] = 0;
        if(!empty($id)) {
            $where["id"] = $id;
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
        $id = Request::instance()->param("id");
        $limit = Request::instance()->param("limit");
        $ids = Request::instance()->param("ids/s");
        //dump($ids);
        $result = 0;
        $where["status"] = 0;
        $where['exam'] = 0;
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