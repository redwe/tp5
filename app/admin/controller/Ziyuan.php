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
use app\admin\model\XmModel;
use app\admin\model\ZyModel;
use PHPExcel;

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

        $view = new View();
        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);

        $xmobj = new XmModel();

        $xmlist = $xmobj->getXmList("kecheng","project",1);
        $view->assign('xmlist',$xmlist);
        $view->assign('project',$project);
        return $view->fetch();
    }
    public function xueli()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");
        $view = new View();

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("xueli","project",1);
        $view->assign('xmlist',$xmlist);

        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);
        $view->assign('project',$project);
        return $view->fetch();
    }
    public function zhengshu()
    {
        $menu = Request::instance()->get("menu");
        $nav3 = Request::instance()->get("nav3");
        $project = Request::instance()->post("project");
        $view = new View();

        $xmobj = new XmModel();
        $xmlist = $xmobj->getXmList("zhengshu","project",1);
        $view->assign('xmlist',$xmlist);

        $view->assign('nav3',$nav3);
        $view->assign('menu',$menu);
        $view->assign('project',$project);
        return $view->fetch();
    }

    public function importExcel(){

        //port('PHPExcel', EXTEND_PATH);
        $rootUrl = $_SERVER['DOCUMENT_ROOT'];

        if (!empty($_FILES['excel']['name'])) {
            $fileName = $_FILES['excel']['name'];    //得到文件全名
            $dotArray = explode('.', $fileName);    //把文件名安.区分，拆分成数组
            $type = end($dotArray);

            if ($type != "xls" && $type != "xlsx") {
                $ret['res'] = "0";
                $ret['msg'] = "不是Excel文件，请重新上传!";
                //return json_encode($ret);
                $this->error($ret['msg']);
            }

            //取数组最后一个元素，得到文件类型
            $uploaddir = $rootUrl."/uploads/" . date("Ymd") . '/';//设置文件保存目录 注意包含
            if (!file_exists($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            $path = $uploaddir . md5(uniqid(rand())) . '.' . $type; //产生随机文件名
            //$path = "images/".$fileName; //客户端上传的文件名；
            //下面必须是tmp_name 因为是从临时文件夹中移动
            move_uploaded_file($_FILES['excel']['tmp_name'], $path); //从服务器临时文件拷贝到相应的文件夹下

            $file_path = $path;
            if (!file_exists($path)) {
                $ret['res'] = "0";
                $ret['msg'] = "上传文件丢失!" . $_FILES['excel']['error'];
                $this->error($ret['msg']);
            }

            $zyObject = new ZyModel();
            $objPHPExcel = new \PHPExcel();

            //文件的扩展名
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            if ($ext == 'xlsx') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                $objPHPExcel = $objReader->load($file_path, 'utf-8');
            } elseif ($ext == 'xls') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($file_path, 'utf-8');
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
                $datas['profes'] = (string)$objPHPExcel->getActiveSheet()->getCell("E$j")->getValue();//需要导入的专业
                $datas['class'] = (string)$objPHPExcel->getActiveSheet()->getCell("F$j")->getValue();//需要导入的科目
                $datas['email'] = (string)$objPHPExcel->getActiveSheet()->getCell("G$j")->getValue();//需要导入的邮箱
                $datas['province'] = (string)$objPHPExcel->getActiveSheet()->getCell("H$j")->getValue();   //需要导入的省份
                $datas['city'] = (string)$objPHPExcel->getActiveSheet()->getCell("I$j")->getValue(); //需要导入的城市
                $create = (string)$objPHPExcel->getActiveSheet()->getCell("J$j")->getValue();     //需要导入的时间
                $datas['create'] = $zyObject->getTimeFormat($create);
                $datas['intent'] = (string)$objPHPExcel->getActiveSheet()->getCell("K$j")->getValue();   //需要导入的意向
                $datas['label'] = (string)$objPHPExcel->getActiveSheet()->getCell("L$j")->getValue();   //需要导入的标签
                $datas['marks'] = (string)$objPHPExcel->getActiveSheet()->getCell("M$j")->getValue();   //需要导入的备注
                $datas['datetime'] = date("Y-m-d h:i:s",time());

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
            $ret['res'] = "0";
            $ret['msg'] = "上传文件失败!";
            $this->error($ret['msg']);
        }
    }
}