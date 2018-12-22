<?php
namespace app\admin\model;

use think\Model;
use think\DB;

class Upload extends Model
{
    //获取省份、分部、身份、岗位
    public function uploadpic($filename,$url,$array){
        $rootUrl = $_SERVER['DOCUMENT_ROOT'];
        $file = $_FILES[$filename];
        if (!empty($file['name'])) {
            $fileName = $file['name'];    //得到文件全名
            $dotArray = explode('.', $fileName);    //把文件名安.区分，拆分成数组
            $type = end($dotArray);
            $type = strtolower($type);

            if (!in_array($type,$array)) {
                $ret['res'] = "0";
                $ret['msg'] = "格式不正确，请重新上传!";
                $ret['data'] = '';
                //return json_encode($ret);
                return $ret;
            }

            //取数组最后一个元素，得到文件类型
            $uploaddir = $url . date("Ymd") . '/';//设置文件保存目录 注意包含
            if (!file_exists($rootUrl.$uploaddir)) {
                mkdir($rootUrl.$uploaddir, 0777, true);
            }
            $uploaddir = $uploaddir. md5(uniqid(rand())) . '.' . $type;
            $path = $rootUrl.$uploaddir; //产生随机文件名
            //$path = "images/".$fileName; //客户端上传的文件名；
            //下面必须是tmp_name 因为是从临时文件夹中移动
            move_uploaded_file($file['tmp_name'], $path); //从服务器临时文件拷贝到相应的文件夹下

            $file_path = $path;
            if (!file_exists($path)) {
                $ret['res'] = "0";
                $ret['msg'] = "上传文件丢失!" . $file['error'];
                $ret['data'] = '';
            }
            else
            {
                $ret['res'] = "1";
                $ret['msg'] = "上传文件成功!";
                $ret['data'] = $uploaddir;
            }
            return $ret;
        }
    }
}